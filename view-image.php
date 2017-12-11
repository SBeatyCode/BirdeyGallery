<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<?php
    if(isset($_GET['art_id']) && $_GET['art_id'] != null) {
        $art_id = $_GET['art_id'];
        $_SESSION['art_id'] = $art_id;
    } else {
        header("Location: index.php");
    }

//get information about the arkwork from the database
    $stmtDB = $db->prepare("SELECT * FROM ba_art WHERE art_id = :art_id");
    $stmtDB->bindParam(':art_id', $art_id);
    $stmtDB->execute();

    while($row = $stmtDB->fetch(PDO::FETCH_ASSOC)) {
        $db_artist_id = $row['artist_id'];
        $db_title = $row['art_title'];
        $db_image = $row['image'];
        $db_date = $row['dateCreated'];
        $db_description = $row['description'];
        $db_tag = $row['tag'];
    }

//get the username of the artist
    $stmtArtist = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
    $stmtArtist->bindParam(':user_id', $db_artist_id);
    $stmtArtist->execute();

    while($row = $stmtArtist->fetch(PDO::FETCH_ASSOC)) {
        $username = $row['username'];
    }


//If the flag link is pressed for a given comment, then lock it
//this is the only action on the site that forces a page refresh, because the action should be veru intentional
    if(isset($_GET['flag'])) {
        $flag_id = $_GET['flag'];
        $stmt = $db->prepare("UPDATE ba_comments SET isFlagged = :isFlagged WHERE comment_id = :comment_id");
        $stmt->bindValue(':isFlagged', 1);
        $stmt->bindParam(':comment_id', $flag_id);
        $stmt->execute();

        echo "<h3 class='bg-success confirm-msg'>The comment has been flagged! Administration will be notified.</h3><br><br>";
    }

?>

<div class="container" id="viewImageContainer">
    <div class="header" id="viewImageHeader">
        <header class="header--banner"><h1><?php echo $db_title; ?></h1></header>
    </div> <!-- /header -->
    
    <div class="main" id="viewImageMain">
        <div class="main--content">
           
            <div class="image-view-wrapper">
                <img class="image-view--image" id="image-1" src="images/art/<?php echo $db_image; ?>">
                
                <?php
                
                    if($db_artist_id == $_SESSION['user_id']) {        
                ?>
                
                <label class="image-view--item"><a class="image-view--commenter-profile-link" href="edit-art.php?art_id=<?php echo $art_id; ?>">Edit Art Information</a></label>
                
                <?php
                    } 
                ?>
                
                <label class="image-view--item"><span class="image-view--text"><em><?php echo $db_title; ?></em></span> by <span class="image-view--text"><em><a class="image-view--commenter-profile-link" href="profile.php?id=<?php echo $db_artist_id; ?>"><?php echo $username; ?></a></em></span></label>
                
                <label class="image-view--item">Created On: <span class="image-view--text"><em><?php echo $db_date; ?></em></span></label>
                
                <label class="image-view--item">Type of Piece: <span class="image-view--text"><em><?php echo $db_tag; ?></em></span></label>
                
                <div class="image-view-description">
                    <em><?php echo $db_description; ?></em>
                </div> <!-- /image-view-description -->
                
                <div class="image-view-comments-wrapper">
                    <div class="image-view-comments--comment-well">
                       
            <?php 
        //if the user is logged in, show the comments form. if not, display a message to prompt them to log in or sign up
                if(isLoggedIn()) { 
            ?>
                       <label for="write-comment" class="image-view--comment-label">Leave A Comment:</label><br><br>
                        <form enctype="multipart/form-data" method="post" class="image-view-comments--comment-form" id="viewImageCommentForm" name="viewImageCommentForm">
                           <label class='error-message' id='imageViewError'></label>
                            <textarea id="write-comment" class="responsive-textarea" placeholder="Leave your comment here" name='comment' id="viewImageComment"></textarea>
                            <div class='upload-buttons'>
                                <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Cancel</button>
                                <button class="btn-birdey upload-buttons--btn" type="button" name="submit" id="viewImageSubmit">Submit</button>
                                <br><br>
                            </div> <!-- /upload-section -->
                        </form> <!-- /viewImageCommentForm -->
            <?php
                } else {
            ?>
                    <div>
                       <h4>Log in, or sign up to leave a comment!</h4>
                       <a class="btn-birdey-wrapper" href="login.php"><input type="button" class="btn-birdey" value="Log In"></a>
                       <a class="btn-birdey-wrapper" href="signup.php"><input type="button" class="btn-birdey" value="Sign Up Here!"></a>
                    </div>
            <?php
                }
                    if($db_artist_id == $_SESSION['user_id']) {
            ?>
                     <a class="btn-birdey-wrapper" id="deleteImage"><input type="button" class="btn-birdey-alert" value="Delete Art"></a>  
            <?php
                    }
            ?>
                    </div> <!-- /comment well-->
                    
                    <div class="image-view-read-comments">
                    
            <?php
        //get and display comments for the artwork                
                $stmt = $db->prepare("SELECT * FROM ba_comments WHERE art_id = :art_id");
                $stmt->bindParam(':art_id', $art_id);
                $stmt->execute();

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $flagged = $row['isFlagged'];

                    if($flagged == 1) {
                        continue;
                    }

                    $comment_id = $row['comment_id'];
                    $user = $row['user'];
                    $comment = $row['comment'];
                    $date = $row['datePosted'];

        //get user's profile image for comment      
                    $stmt2 = $db->prepare("SELECT * FROM ba_users WHERE username = :username");
                    $stmt2->bindParam(':username', $user);
                    $stmt2->execute();

                    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        $commenter_id = $row2['user_id'];
                        $image = $row2['image'];
                    }
            ?>

            <!-- Pulling comments from the database  -->
                       <div class="image-view-read-comments--comment-wrapper">
                           <textarea class="responsive-textarea image-view-read-comments--textarea" readonly value=""><?php echo $comment; ?></textarea>
                            <div class="image-view-read-comments--commenter-info">
                                <img class="image-view-read-comments--commenter-image" src="images/profilePics/<?php echo $image; ?>">
                                
                                <span class="image-view--text"><i class="fa fa-user-circle" aria-hidden="true"></i> <a class="image-view--commenter-profile-link" href="profile.php?id=<?php echo $commenter_id; ?>"><?php echo $user; ?></a></span>&nbsp;
                                
                                <span class="image-view--text"><i class="fa fa-calendar" aria-hidden="true"></i> <?php  echo $date; ?></span>
                                &nbsp;
                                
                                <span>
                                    <a class="image-view--flag-comment" onClick="return confirm('Flag a comment that is toxic or otherwise inappropriate, NOT a comment that you disagree with. Are you sure you want to flag this comment?');" href='view-image.php?art_id=<?php echo $art_id; ?>&flag=<?php echo $comment_id; ?>' class='btn-flag'>
                                        <i class="fa fa-flag" aria-hidden="true"></i> Flag
                                    </a>
                                </span>
                            </div> <!-- /image-view-read-comments--commenter-info -->
                       </div> <!-- /image-view-read-comments--comment-wrapper -->
            <?php
                }
            ?>
                    </div> <!-- /image-view-read-comments" -->
                </div> <!-- /image-view-comments-wrapper -->
            </div> <!-- /image-view-wrapper --> 
            
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>