<?php session_start(); ?>
<?php include 'includes/config.php'; ?> 
<?php include 'includes/functions.php'; ?>


<?php

    if(isset($_SESSION['art_id']) && $_SESSION['art_id'] != null) {
        $art_id = $_SESSION['art_id'];
    } else {
        header("Location: index.php");
    }

?>


<?php
    $art_title = sanitize($_POST['art_title']);
    $art_date = sanitize($_POST['art_date']);
    $description = sanitize($_POST['art_description']);
    $art_Tag = $_POST['art_Tag'];

    $stmt = $db->prepare("UPDATE ba_art SET art_title = :art_title, dateCreated = :dateCreated, description = :description, tag = :tag WHERE art_id = :art_id");
    $stmt->bindParam(':art_title', $art_title);
    $stmt->bindParam(':dateCreated', $art_date);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':tag', $art_Tag);
    $stmt->bindParam(':art_id', $art_id);
    $stmt->execute();
?>
    
    <div class="main" id="uploadArtMain">
        <h3 class="main--heading">Click the button below to view your piece!</h3>
        <div class="main--content">
            <a class="btn-birdey-wrapper" href="view-image.php?art_id=<?php echo $art_id; ?>"><input type="button" class="btn-birdey" value="View"></a>
        </div> <!-- /content -->
        <script src="js/art-info.js"></script>
    </div> <!-- /main -->
        