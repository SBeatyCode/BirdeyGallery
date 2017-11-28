<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Art Gallery</h1></header>
        <p class="header--text">
           View all uploaded artwork by all users!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Gallery</h3>

        <p>
            Click an image to go to the artist's page.
        </p>
        
        <h4><p>View By Tag:</p></h4>
        
        <ul class="main--filters--wrapper">
            <li class="main--filters" id="Watercolor">Watercolor</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="paint">Painting</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Pencils</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Pen/Ink</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Digital</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Pixel Art</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Photography</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="Watercolor">Other</li>
        </ul>
        
        <div class="main--content">
            <div class="gallery-images">
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div> <!-- /gallery-images--image-wrapper -->
                
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div> <!-- /gallery-images--image-wrapper -->
                
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/birbsPage.jpg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div> <!-- /gallery-images--image-wrapper -->
                
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div> <!-- /gallery-images--image-wrapper -->
                
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/birbsPage.jpg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div> <!-- /gallery-images--image-wrapper -->
                
                <div class="gallery-images--image-wrapper">
                    <a href=""><img class="gallery-images--image" id="image-1" src="images/art/birbsPage.jpg"></a>
                    <label>'KK Slider' by <a class="gallery-images--link" href="">Nintendo</a></label>
                </div> <!-- /gallery-images--image-wrapper -->
            </div> <!-- /gallery-images -->
        </div> <!-- /content -->
        
        <input type="button" class="btn-birdey" value="test">
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>