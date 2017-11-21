<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner">Birdey Gallery</header>
        <p class="header--text">
           Any subtext that goes below the main header
        </p> <!-- /header--text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 clas="main--heading">Section Heading</h3>

        <div class="main--content">
            Whatever is the main content goes in here
        </div> <!-- /content -->
        
        <input type="button" class="birdey-btn" value="test">
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>