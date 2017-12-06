<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>
 
<!--    Main Section   -->
    <div id="header-container container-fluid">
       <div class="row">
           <div class="col-sm-8 col-sm-offset-2 well" id="headerWell">
               <header class="header">
                   <h2><em>Art Gallery</em></h2>
                </header>
                <br>
           </div>  <!-- /col-->
       </div> <!-- /row -->           
    </div> <!-- /container-fluid-->
    <br>
    
    <div class="container-fluid content-container">
        <div class="row">
           <div class="col-md-10 col-md-offset-1" id="gallery-container">
                <h3>Browse through my work, leave a comment, and share with your friends!</h3>
          
             <!--    Show all the images here - loop with PHP    -->    
                <div id="art-post-container">
                 
        <?php

            $stmt = $db->prepare("SELECT * FROM ba_art");
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $art_id = $row['art_id'];
                $title = $row['art_title'];
                $image = $row['image'];
                $date = $row['dateCreated'];
                $description = substr($row['description'], 0, 300) . '...';
            

        ?>
                 
                  <div class="art-post row well">
                      <a href="image_view.php?id=<?php echo $art_id; ?>"><img class="thumbnail col-sm-3" src="images/art/<?php echo $image; ?>"></a>
                      <label class="col-sm-7"><a href="image_view.php?id=<?php echo $art_id; ?>"><?php echo $title; ?></a></label>
                      <a href="image_view.php?id=<?php echo $art_id; ?>">
                          <aside class="col-sm-7 art-post-description"><?php echo $description; ?></aside>
                      </a>
                  </div><br>
        <?php
            }
        ?>
                </div> <!-- /art-post container -->
           </div> <!-- /col md 10 -->
        </div> <!-- /row -->
    </div> <!-- /container -->

    <?php 

    if(!isLoggedIn()) {
        echo (sanitize('  thi// ss  aa strING')); 
    }

    if(usernameExists('Birdeynamnam')) {
        echo 'Hello, Eva!';
    }

    echo $username = ' Hello, ' . sanitize($_POST['username']) . '!';

    ?>
<?php include 'includes/footer.php'; ?> 