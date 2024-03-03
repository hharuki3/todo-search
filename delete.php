<?php
    require("db_connect.php");

    $id = $_GET['id'];
    try{
        $pdo = db_connect();
        $sql = 'delete from posts where id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location:main.php");
    }catch(PDOException $e){
        $e->getMessage();
        die();
    }
?>
