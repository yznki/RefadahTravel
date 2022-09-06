<?php 

    session_start();
    if (($_SESSION['delete']) != 1) {
        header('Location:index.php');
    }else{
        
        require "connectingtodatabase.php";

        $delPack = $_GET['package'];
        $id = $_GET['id'];
    
        $sql = "DELETE FROM customer_packages WHERE customerID = :id AND selectedpackageID = :packageID";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id',$id,PDO::PARAM_INT);
        $statement->bindParam(':packageID',$delPack,PDO::PARAM_STR);
        $statement->execute();
        $_SESSION['delete'] = 0;
        header('Location:profile.php');
    }
    
    
?>