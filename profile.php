<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<div class="container">
    
    <aside>
        <div class='profile-wrapper'>
            <div class='profile'>
               <header><h1>[username]'s Profile</h1></header>
                <img class='profile--pic' src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg">
                <div class='profile--info'>
                    <div>Username</div>
                    <div>Number of art pieces: [4]</div>
                    <div class='profile--about'>
                        <p>THis is where a user would write a short descripton of themselves, like around 200ish characters or so. Just a quick hello! </p>
                    </div>
                    
                     <!-- THis edit button only shows up if the user is the one logged in - use PHP -->
                    <div><span class='profile-edit'>Edit</span></div>
                    
                </div> <!-- /profile--info -->
            </div> <!-- /profile -->
        </div> <!-- /profile-wrapper -->
    </aside>
    
    <div class='profile-gallery'>
        <div class="profile-gallery--image-wrapper">
            <a href=""><img class="profile-gallery--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
            <label>'KK Slider'</label>
        </div> <!-- /profile-gallery--image-wrapper -->
        
        <div class="profile-gallery--image-wrapper">
            <a href=""><img class="profile-gallery--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
            <label>'KK Slider'</label>
        </div> <!-- /profile-gallery--image-wrapper -->
        
        <div class="profile-gallery--image-wrapper">
            <a href=""><img class="profile-gallery--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
            <label>'KK Slider'</label>
        </div> <!-- /profile-gallery--image-wrapper -->
        
        <div class="profile-gallery--image-wrapper">
            <a href=""><img class="profile-gallery--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
            <label>'KK Slider'</label>
        </div> <!-- /profile-gallery--image-wrapper -->
        
        <div class="profile-gallery--image-wrapper">
            <a href=""><img class="profile-gallery--image" id="image-1" src="images/art/polls_profiles_totakeke_3907_348576_xlarge_0419_833896_poll_xlarge.jpeg"></a>
            <label>'KK Slider'</label>
        </div> <!-- /profile-gallery--image-wrapper -->
    </div> <!-- profile-gallery -->
    
</div> <!-- /container -->


<?php include 'includes/footer.php'; ?>