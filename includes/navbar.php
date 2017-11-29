<?php include'includes/functions.php'; ?>
<!--    Navbar    -->
<nav class="navbar">
    <!--    mobile display    -->
    <div class="navbar--mobile">
      <a class="navbar--mobile--brand navbar-menu-item" href="index.php"><span><i class="fa fa-paint-brush" aria-hidden="true"></i></span>&nbsp; Birdey Art</a>
      
        <!-- This section will display on screens that are 900px wide or larger-->
            <div class="navbar--menu-bar">
                <ul class="navbar--menu-bar--list">
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="about.php"><i class="fa fa-question-circle" aria-hidden="true"></i> About</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="links.php"><i class="fa fa-laptop" aria-hidden="true"></i> Links</a></li>
                    
                    <!-- Need to add PHP quereies as to whther the user is logged in or not as to what it displays here - like in BirdeyArt -->
<!--
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>
-->
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="profile.php"><i class="fa fa-id-card" aria-hidden="true"></i> Profile</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="upload-art.php"><i class="fa fa-plus-square" aria-hidden="true"></i> Upload Art</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="notifications.php"><i class='fa fa-envelope' aria-hidden='true'></i> Notifications</a></li>
                    
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>

                    <!--
                    template for adding menu items
                    <li class="navbar--menu-bar--list--item"><a class="navbar-menubar-list-item--text" href="#"></a></li>
                    -->

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
            
            <!-- Need to add PHP quereies as to whther the user is logged in or not as to what it displays here - like in BirdeyArt -->
<!--
            <li><a class="navbar--mobile--menu--list-item" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>
-->
            <li><a class="navbar--mobile--menu--list-item" href="profile.php"><i class="fa fa-id-card" aria-hidden="true"></i> Profile</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="upload-art.php"><i class="fa fa-plus-square" aria-hidden="true"></i> Upload Art</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="notifications.php"><i class='fa fa-envelope' aria-hidden='true'></i> Notifications</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
            
            <!-- 
            template for adding more nav items
            <li><a class="navbar--mobile--menu--list-item" href="#"></a></li>
            -->
        </ul> <!-- /navbar-mobile-menu-list -->
    </div>  <!-- /navbar-mobile-menu -->
    
</nav> <!-- /navbar-->