<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Birdey Gallery</h1></header>
        <p class="header--text">
           Welcome to Birdey Gallery! This is a site to showcase the art and photography of Birdeynamnam. Take a look around, and enjoy!
        </p> <!-- /header-text -->
        
        <p class="header--text">Start by checking out the <a class="header--text--link" href='#'>Gallery</a>, or <a class="header--text--link" href="#">log in</a> to post your own art and post comments!</p>
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Birdey Gallery</h3>

        <div class="main--content">
            <div class="frontpage-images">
               <h3>Recent Art Postings</h3>

                <img class="frontpage-images--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg">
                <img class="frontpage-images--image" id="image-2" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg">
                <img class="frontpage-images--image" id="image-3" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg">
            </div> <!-- /frontpage-images -->
        </div> <!-- /content -->
        
        <input type="button" class="btn-birdey" value="test">
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>