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
    if($description == '') {
        $description = 'No Description Yet';
    }

    $tag = sanitize($_POST['art_Tag']);
    if($tag == '') {
        $tag = 'Other';
    }


    $stmt = $db->prepare("UPDATE ba_art SET art_title = :art_title, dateCreated = :dateCreated, description = :description, tag = :tag WHERE art_id = :art_id");
    $stmt->bindParam(':art_title', $art_title);
    $stmt->bindParam(':dateCreated', $art_date);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':tag', $tag);
    $stmt->bindParam(':art_id', $art_id);
    $stmt->execute();
?>

    <div class="main" id="editArtMain">
        <h3 class="main--heading">Edit the information about your art here:</h3>
        <div class="main--content">
            <h3 class='confirmation-message-success'>Image Information Has Been Updated!</h3>
            <a class="btn-birdey-wrapper" href="view-image.php?art_id=<?php echo $art_id; ?>"><input type="button" class="btn-birdey" value="View"></a>
        </div> <!-- /content-->
    </div> <!-- /main -->