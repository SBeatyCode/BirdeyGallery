<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>
              
              
<div class="header" id='profileImageHeader'>
<header class="header--banner"><h1>Edit Profile Image</h1></header>
                
            <p class="header--text">
               Profile Image Added Successfully!
            </p> <!-- /header-text -->
        </div> <!-- /header -->

              <div class="main" id='signup-main'>
                <h3 class="main--heading">You Have Successfully Added a Profile Image! Swiggitty swiggity SWAG $$$$$</h3>
                
                <div id='profileImage'>
                    <?php echo ($_FILES['file']['name']); ?>
                </div> <!-- /profileImage -->
                
                <div class="main--content">
                </div> <!-- /content -->
              </div> <!-- /main -->              
<?php include 'includes/footer.php' ?>