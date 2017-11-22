<?php include'includes/functions.php'; ?>
<!--    Navbar    -->
<nav class="navbar">
    <!--    mobile display    -->
    <div class="navbar--mobile">
      <a class="navbar--mobile--brand navbar-menu-item" href="index.php"><span><i class="fa fa-paint-brush" aria-hidden="true"></i></span>&nbsp; Birdey Art</a>
      
      <!-- icon to make the menu appear -->
      <span class="navbar--mobile--menu-btn navbar-menu-item" id="menu-button"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </div> <!-- /navbar--mobile -->
    
    <!-- This section gets toggled in mobile -->
    <div class="navbar--mobile--menu" id="navbar--mobile--menu">
        <ul class="navbar--mobile--menu--list">
            <li><a class="navbar--mobile--menu--list-item" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i> Art Gallery</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="about.php"><i class="fa fa-question-circle" aria-hidden="true"></i> About</a></li>
            <li><a class="navbar--mobile--menu--list-item" href="links.php"><i class="fa fa-laptop" aria-hidden="true"></i> Links</a></li>
        </ul> <!-- /navbar--mobile--menu--list -->
    </div> <!-- /navbar--mobile--menu -->
<!--
    <div class="collapse navbar-collapse dropdown" id="topNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        <li><a href="gallery.php"><i class="fa fa-picture-o" aria-hidden="true"></i> Art Gallery</a></li>
        <li><a href="about.php"><i class="fa fa-question-circle" aria-hidden="true"></i> About</a></li>
        <li><a href="links.php"><i class="fa fa-laptop" aria-hidden="true"></i> Links</a></li>
      </ul>
      
        <ul class="nav navbar-nav navbar-right">
-->
<!-- if user is an admin -->
        <?php
//            if(isAdmin()) {

//check if any of the comments have been flagged - if one or more has, then show the New Motifications alert      
//                if(checkFlagged()) {
//                    echo "<li><a href='management-comments.php'><i class='fa fa-envelope' aria-hidden='true'></i> New Notifications!</a></li>";
//                }
         ?>
<!--
          
          <li><a href="postNewArt.php"><i class="fa fa-plus-square" aria-hidden="true"></i> Post New Art</a></li>          
          <li><a href="site-management.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Site Management</a></li>
-->
        <?php  
//            }
        ?>
        
        <?php
 //if the user is logged in, display their name + link to their profile page, and a logout button. If not, display login prompt and a signup-link       
//            if(isLoggedIn()) {
        ?>
<!--
           <li><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;<?php #echo $_SESSION['username']; ?></a></li>
           <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
-->
        <?php
//            } else {
        ?>
<!--
            <li><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> New? Sign Up Here</a></li>
            <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>
-->
        <?php
//            }
        ?>
        
        </ul>
<!--    </div> /navbar-collapse -->
</nav> <!-- /navbar-->