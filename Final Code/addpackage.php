<?php 

    session_start();
    if (($_SESSION['add']) != 1) {
        header('Location:packages.php');
    }else{
        
        require "connectingtodatabase.php";

        $delPack = $_GET['package'];
        $id = $_GET['id'];

        $sql = "SELECT * FROM customer_packages WHERE customerID = :id AND selectedpackageID = :packageID";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id',$id,PDO::PARAM_INT);
        $statement->bindParam(':packageID',$delPack,PDO::PARAM_STR);
        $statement->execute();
        $count = $statement->rowCount();

        if($count == 1) {
            header('Location:profile.php');
        }
        else {
    
        $sql = "INSERT INTO customer_packages VALUES (:id, :packageID)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id',$id,PDO::PARAM_INT);
        $statement->bindParam(':packageID',$delPack,PDO::PARAM_STR);
        $statement->execute();
        $_SESSION['add'] = 0;
        header('Location:profile.php');
        }
    }
    
    
?>