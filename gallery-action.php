<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>


    <div class="main" id="galleryMain">
        <h3 class="main--heading">Gallery</h3>
        
        <h4><p>View By Tag:</p></h4>
        
        <ul class="main--filters--wrapper">
            <li class="main--filters" id="watercolor">Watercolor</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="painting">Painting</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="pencil">Pencil</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="pen_ink">Pen/Ink</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="digital">Digital</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="pixel_art">Pixel Art</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="photography">Photography</li>
            <li class="main--filters--spacing">&diams; &nbsp;</li>
            <li class="main--filters" id="other">Other</li>
        </ul>
        
        <div class="main--content">
            <div class="gallery-images">
               
            <?php
            //checking to see which tag was selected, then passing that variable to the query to get only those images
                
                    if(isset($_POST['watercolor'])) {
                        $tag = $_POST['watercolor'];
                        
                    } else if($_POST['painting']) {
                        $tag = $_POST['painting'];
                        
                    } else if($_POST['pencil']) {
                        $tag = $_POST['pencil'];
                        
                    } else if($_POST['pen_ink']) {
                        $tag = $_POST['pen_ink'];
                        
                    } else if($_POST['digital']) {
                        $tag = $_POST['digital'];
                        
                    } else if($_POST['pixel_art']) {
                        $tag = $_POST['pixel_art'];
                        
                    } else if($_POST['photography']) {
                        $tag = $_POST['photography'];
                        
                    } else if($_POST['other']) {
                        $tag = $_POST['other'];
                        
                    } 
                
           //get the images from the database based on the chosexn tag    
                    $stmt = $db->prepare("SELECT * FROM ba_art WHERE tag = :tag ORDER BY art_id DESC");
                    $stmt->bindParam(':tag', $tag);
                    $stmt->execute();

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $art_id = $row['art_id'];
                        $artist_id = $row['artist_id'];
                        $title = $row['art_title'];
                        $image = $row['image'];
                        
            //get artist name
                        $stmtName = $db->prepare("SELECT * FROM ba_users WHERE user_id = :user_id");
                        $stmtName->bindParam(':user_id', $artist_id);
                        $stmtName->execute();

                        while($row = $stmtName->fetch(PDO::FETCH_ASSOC)) {
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                        }
            ?>
                <div class="gallery-images--image-wrapper">
                    <a href="view-image.php?art_id=<?php echo $art_id; ?>"><img class="gallery-images--image" src="images/art/<?php echo $image; ?>"></a>
                    <label><a class="gallery-images--link" href="view-image.php?art_id=<?php echo $art_id; ?>"><?php echo $title; ?></a> by <a class="gallery-images--link" href="profile.php?id=<?php echo $user_id; ?>"><?php echo $username; ?></a></label>
                </div> <!-- /gallery-images--image-wrapper -->
            <?php
                    }
            ?>
                
            </div> <!-- /gallery-images -->
        </div> <!-- /content -->
        <script src="js/gallery.js"></script>
    </div> <!-- /main -->