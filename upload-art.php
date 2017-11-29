<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    <div class="header">
        <header class="header--banner"><h1>Upload Art</h1></header>
        <p class="header--text">
           Post a new work of art here!
        </p> <!-- /header-text -->
    </div> <!-- /header -->
    
    <div class="main">
        <h3 class="main--heading">Please fill the information about your art here:</h3>

        <div class="main--content">
            <div class='upload-wrapper'>
              <form enctype="multipart/form-data" method="post">
                    <div class='upload-section'>
                       <label class='upload-section--label' for="image">Choose an image to upload: </label>
                       <input type="file" name="image">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="artName">Title of Piece</label>
                        <input type="text" placeholder="Name of Art" name="art_title">
                    </div> <!-- /upload-section -->
                    
                    <div class='upload-section'>
                       <label class='upload-section--label' for="artTag">Select a Tag For Your Art</label>
                        <select id="artTag">
                            <option>Painting</option>
                            <option>Watercolor</option>
                            <option>Pencil</option>
                            <option>Pen/Ink</option>
                            <option>Digital</option>
                            <option>Pixel</option>
                            <option>Photograghy</option>
                            <option>Other</option>
                        </select>
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="artDate">Date Created </label>
                        <input type="date" class="date" name="art_date">
                    </div> <!-- /upload-section -->

                    <div class='upload-section'>
                        <label class='upload-section--label' for="description">Write a description</label>
                        <textarea class='responsive-textarea' placeholder="Say something about the piece here..." name="description"></textarea>
                    </div> <!-- /upload-section -->

                    <div class='upload-buttons'>
                        <button class="btn-birdey upload-buttons--btn" type="reset" name="reset">Reset</button>
                        <button class="btn-birdey upload-buttons--btn" type="submit" name="submit">Submit</button>
                    </div> <!-- /upload-section -->
              </form>
            </div> <!-- /upload-wrapper -->

        </div> <!-- /content -->
    </div> <!-- /main -->
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>