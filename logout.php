<?php session_start(); ?>
<?php

        $_SESSION['user_id'] = null;
        $_SESSION['username'] = null;
        $_SESSION['name'] = null;
        $_SESSION['isAdmin'] = null;

        session_unset();
        session_destroy();

        header("Location: index.php");
?>