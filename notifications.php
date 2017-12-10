<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container" id="notificationsContainer">
    <div class="header" id="notificationsHeader">
        <header class="header--banner"><h1>Notifications</h1></header>
        <p class="header--text">
           Check to see comments on your art that have been flagged by other users
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main" id="notificationsMain">
        <h3 class="main--heading">Flagged Comments</h3>

        <div class="main--content">
            <div class='flagged-comment--wrapper'>
               
    <?php
                
//If the delete button is pressed for a given comment, delete the selected comment
        if(isset($_GET['delete_id'])) {
            $delete_id = $_GET['delete_id'];
            $stmt = $db->prepare("DELETE FROM ba_comments WHERE comment_id = :comment_id");
            $stmt->bindParam(':comment_id', $delete_id);
            $stmt->execute();
            
            echo "<h3 class='bg-success confirm-msg'>Comment has been deleted!</h3><br><br>";
        }
                
//If the unlock link is pressed for a given comment, then unlock it
        if(isset($_GET['unlock'])) {
            $comment_id = $_GET['unlock'];
            $stmt = $db->prepare("UPDATE ba_comments SET isFlagged = :isFlagged WHERE comment_id = :comment_id");
            $stmt->bindValue(':isFlagged', 0);
            $stmt->bindParam(':comment_id', $comment_id);
            $stmt->execute();

            echo "<h3 class='bg-success confirm-msg'>Comment has been unlocked!</h3><br><br>";
        }
                
//get and display comments for the artwork                
        $stmt = $db->prepare("SELECT * FROM ba_comments WHERE artist_id = :artist_id");
        $stmt->bindParam(':artist_id', $_SESSION['user_id']);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $flagged = $row['isFlagged'];

            if($flagged == 0) {
                continue;
            }

            $comment_id = $row['comment_id'];
            $user = $row['user'];
            $comment = $row['comment'];
            $date = $row['datePosted'];
            $art_id = $row['art_id'];

//get user's profile image for comment      
            $stmt2 = $db->prepare("SELECT * FROM ba_users WHERE username = :username");
            $stmt2->bindParam(':username', $user);
            $stmt2->execute();

            while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                $commenter_id = $row2['user_id'];
                $image = $row2['image'];
            }
    ?>
               
                <div class='flagged-comment'>
                    <textarea class='responsive-textarea' readonly><?php echo $comment; ?></textarea>

                    <div class='flagged-comment--commenter'>
                        <img class='flagged-comment--commenter--image' src="images/profilePics/<?php echo $image; ?>">
                        <label><a class="flagged-comment-action" href="profile.php?id=<?php echo $commenter_id; ?>"><?php echo $user; ?></a></label>
                    </div> <!-- /flagged-comment--commenter -->
                    
                    <div class="flagged-comment--view-image-wrapper">
                        <a class="flagged-comment-action" href="view-image.php?art_id=<?php echo $art_id; ?>">View Image</a>
                    </div> <!-- /flagged-comment--view-image-wrapper -->
                    
                    <div class='flagged-comment--btn-wrapper'>
                        <a href='notifications.php?unlock=<?php echo $comment_id; ?>' class='comment-unflag flagged-comment-action'><i class="fa fa-unlock" aria-hidden="true"></i> Unflag</a>

                        <a onClick="return confirm('Are you sure you want to delete this comment?');" href='notifications.php?delete_id=<?php echo $comment_id; ?>' class='flagged-comment-action flagged-comment--delete'><i class="fa fa-window-close-o" aria-hidden="true"></i> Delete</a>
                    </div> <!-- /flagged-comment--btn-wrapper -->
                </div> <!-- /flagged-comment -->
                
            <?php
                }
            ?>

            </div> <!-- /flagged-comment--wrapper -->
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>