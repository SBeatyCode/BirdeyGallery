<?php session_start(); ?>
<?php include'includes/functions.php'; ?>
<!--    Navbar    -->
<nav class="navbar">
    <!--    mobile display    -->
    <div class="navbar--mobile">
      <a class="navbar--mobile--brand navbar-menu-item" href="index.php"><span><i class="fa fa-paint-brush" aria-hidden="true"></i></span>&nbsp; Birdey Gallery</a>
      
        <!-- This section will display on screens that are 900px wide or larger-->
            <div class="navbar--menu-bar">
                <ul class="navbar--menu-bar--list">
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="about.php"><i class="fa fa-question-circle" aria-hidden="true"></i> About</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="links.php"><i class="fa fa-laptop" aria-hidden="true"></i> Links</a></li>
                    
                    <?php
                        
                        if(isLoggedIn()) {
                    //display these navbar items when the user is logged in, ELSE display the next set of items
                    ?>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-id-card" aria-hidden="true"></i> Profile</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="upload-art.php"><i class="fa fa-plus-square" aria-hidden="true"></i> Upload Art</a></li>
                    
                    <?php
                      if(checkFlagged($_SESSION['user_id'])) {
                       
                    ?>
                    <li class="navbar--menu-bar--list--item navbar--alert"><a class="navbar-menubar-list-item--text" href="notifications.php"><span class="navbar--alert"><i class='fa fa-envelope' aria-hidden='true'></i> Notifications</span></a></li>
                    <?php
                      } else {
                    ?>
                         <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="notifications.php"><i class='fa fa-envelope' aria-hidden='true'></i> Notifications</a></li>
                         
                    <?php
                      }    
                    ?>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                    
                    <?php
                            
                        } else {
                            
                    ?>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>
                    
                    <?php
                        }
                    ?>

                </ul> <!-- /navbar-mobile-menu-list -->
            </div> <!-- /navbar--menu-bar -->

      
      <!-- icon to make the menu appear -->
      <span class="navbar--mobile--menu-btn navbar-menu-item" id="menu-button"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </div> <!-- /navbar-mobile -->
    
    <!-- This section gets toggled in mobile -->
    <div class="navbar--mobile--menu" id="navbar-dropmenu">
        <ul class="navbar--mobile--menu--list">
            <li><a class="navbar--mobile--menu--list-item" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="about.php"><i class="fa fa-question-circle" aria-hidden="true"></i> About</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="links.php"><i class="fa fa-laptop" aria-hidden="true"></i> Links</a></li>
            
            <?php
            //display these navbar items when the user is logged in, ELSE display the next set of items
                if(isLoggedIn()) {
                    
            ?>
            
            <li><a class="navbar--mobile--menu--list-item" href="profile.php"><i class="fa fa-id-card" aria-hidden="true"></i> Profile</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="upload-art.php"><i class="fa fa-plus-square" aria-hidden="true"></i> Upload Art</a></li>
            
                <?php
                  if(checkFlagged($_SESSION['user_id'])) {

                ?>
            <li><a class="navbar--mobile--menu--list-item navbar--alert" href="notifications.php"><span class="navbar--alert"><i class='fa fa-envelope' aria-hidden='true'></i> Notifications</span></a></li>
                <?php
                  } else {
                ?>
            <li><a class="navbar--mobile--menu--list-item" href="notifications.php"><i class='fa fa-envelope' aria-hidden='true'></i> Notifications</a></li>
                <?php
                  }    
                ?>
    
            <li><a class="navbar--mobile--menu--list-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
            
            <?php
                    
                } else {
                    
            ?>
            
            <li><a class="navbar--mobile--menu--list-item" href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>

            <?php
                }
            
            ?>

        </ul> <!-- /navbar-mobile-menu-list -->
    </div>  <!-- /navbar-mobile-menu -->
    
</nav> <!-- /navbar-->