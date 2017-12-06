<?php
//connect to the databse

//    print_r(PDO::getAvailableDrivers());

        try {
            $db = new PDO('mysql:host=127.0.0.1;dbname=birdeyart;port=3306', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
//            echo "The Connection works!";
        } catch(PDOException $e) {
            echo $e->getMessage();
            die('There is a problem with the database. Please Contact the Database Administrator.');
        }
        

//    var_dump($db);
?>