<?php

    function isLoggedIn() {
//check to see if the user browsing the site is logged in or not
        if(isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }

    function usernameExists($username) {
//check to see if the entered username already exists in the database
        global $db;
        
        $stmt = $db->prepare("SELECT * FROM ba_users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if(($stmt->rowCount()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkFlagged($user_id) {
//check for flagged comments, return 'true' if there are any
        global $db;
        
        $stmt = $db->prepare("SELECT * FROM ba_comments WHERE artist_id = :artist_id");
        $stmt->bindParam(':artist_id', $user_id);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($row['isFlagged'] == 1) {
                $newAlerts = true;
            }
        }
        
        if($newAlerts) {
            return true;
        } else {
            return false;
        }
    }

    function sanitize($data) {
//sanitize user-input data to prevent sql inject, etc
        
//trim whitespace, convert special chars (including quotes) to html entitites, get rid of slashes, replace (',') with '' so an array can't be input
        trim( htmlspecialchars (stripslashes ( str_replace( array( '(', ')' ), '', $data ) ) ), ENT_QUOTES );
        
        return $data;
    }

    function checkImage($image) {
//checking to make sure an uploaded file is an image. Used in conjunction with a .htaccess file to ensure something is an image and ONLY and image
        
//creating an array of approved-image types
        $supported_image = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
        );
        
 //grabbing the extension from the image, and using strtolower to ignore case       
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION)); 
        
//check if the extension is in the array, return true if yes, false if no
        if (in_array($ext, $supported_image)) {
            return true;
        } else {
            return false;
        }
    }

    function resetRedirect() {
//function to redirect users without the proper authentication on the password reset page.
        global $db;
        
        $_SESSION['reset'] = null;
        $_SESSION['reset-check'] = null;

        session_unset();
        session_destroy();

        header("Location: index.php");
    }

    function unsetToken($id) {
//function to set the token feild in the db to an empty string
        global $db;
        
        $stmt = $db->prepare("UPDATE ba_users SET token = :token WHERE user_id = :user_id");
        $stmt->bindValue(':token', '');
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();
    }

    function generateToken($user_id) {
//function to create a random token for the provided user
        global $db;
        
        $token = bin2hex(openssl_random_pseudo_bytes(50));

        $stmt = $db->prepare("UPDATE ba_users SET token = :token WHERE user_id = :user_id");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }

?>