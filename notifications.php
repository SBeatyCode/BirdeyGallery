<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Notifications</h1></header>
        <p class="header--text">
           Check to see comments on your art that has been flagged by other users
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Flagged Comments</h3>

        <div class="main--content">
            <div class='flagged-comment'>
                
                <textarea class='flagged-comment--comment' readonly>This is where the comment goes. Your art was TOO GOOD, maaan. Like how dare you. How dare you be so good.</textarea>
                
                <div class='flagged-comment--commenter'>
                    <img class='flagged-comment--commenter--image' src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg">
                    <label>KK Slider</label>
                </div> <!-- /flagged-comment--commenter -->

                <a href='#.php?unlock=<?php echo '$comment_id'; ?>' class='comment-unflag flagged-comment-action'><i class="fa fa-unlock" aria-hidden="true"></i> Unflag</a>

                <a onClick="return confirm('Are you sure you want to delete this comment?');" href='#.php?delete_id=<?php echo '$comment_id'; ?>' class='comment-delete flagged-comment-action'><i class="fa fa-window-close-o" aria-hidden="true"></i> Delete</a>
            </div> <!-- /flagged-comment -->
        </div> <!-- /content -->
        
        <input type="button" class="btn-birdey" value="test">
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>