<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
       
<?php
    if(isset($_SESSION['art_id']) && $_SESSION['art_id'] != null) {
        $art_id = $_SESSION['art_id'];
    } else {
        header("Location: index.php");
    }
?>


<?php include 'includes/footer.php'; ?>