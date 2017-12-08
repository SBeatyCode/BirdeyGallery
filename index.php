<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Birdey Gallery</h1></header>
        
        <?php
            if(isLoggedIn()) {
                
        ?>
        Welcome Back, <span class="header--username"><?php echo $_SESSION['name']; ?></span>!
    </div> <!-- /header -->
       
        <?php
            } else {
                
        ?>
        <p class="header--text">
           Welcome to Birdey Gallery! This is a site to showcase the art and photography of Birdeynamnam. Take a look around, and enjoy!
        </p> <!-- /header-text -->
        <p class="header--text">Start by checking out the <a class="header--text--link" href="gallery.php">Gallery</a>, or <a class="header--text--link" href="login.php">log in</a> to post your own art and post comments!</p>
    </div> <!-- /header -->
       
        <?php
            }
        ?>
    
    <div class="main">
        <h3 class="main--heading">Recent Art Postings</h3>

        <div class="main--content">
            <div class="frontpage-images">
                <div class="frontpage-images--image-wrapper">
                    <a href=""><img class="frontpage-images--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
                    <label>'KK Slider' by <a class="frontpage-images--link" href="">Nintendo</a></label>
                </div> <!-- /frontpage-images--image-wrapper -->
                
                <div class="frontpage-images--image-wrapper">
                    <a href=""><img class="frontpage-images--image" id="image-2" src="images/art/birbsPage.jpg"></a>
                    <label>'KK Slider' by <a class="frontpage-images--link" href="">Nintendo</a></label>
                </div> <!-- /frontpage-images--image-wrapper -->
                
                <div class="frontpage-images--image-wrapper">
                    <a href=""><img class="frontpage-images--image" id="image-3" src="images/art/birbsPage.jpg"></a>
                    <label>'KK Slider' by <a class="frontpage-images--link" href="">Nintendo</a></label>
                </div> <!-- /frontpage-images--image-wrapper -->
                
                <div class="frontpage-images--image-wrapper">
                    <a href=""><img class="frontpage-images--image" id="image-4" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
                    <label>'KK Slider' by <a class="frontpage-images--link" href="">Nintendo</a></label>
                </div> <!-- /frontpage-images--image-wrapper -->
            </div> <!-- /frontpage-images -->
            
            <p>
                This is a paragragh that talks a little bit more about the site, maybe!
            </p>
        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>