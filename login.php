<?php
    require('db_connect.php');

    $name = $_POST['name'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if(!empty($submit)){
        try{
            $pdo = db_connect();
            $sql = "SELECT * FROM users WHERE name = :name AND password = :password";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
        if($stmt->fetch(PDO::FETCH_ASSOC)){
            header("Location:main.php");
            exit;
        }else{
            echo '<font color="red">パスワードか名前に間違いがあります。</font>';
        }
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>ログインページ</div>
    <div>
        <form action="" method="POST">
            <input type="text" class="input-area" name="name" required><br>
            <input type="password" class="input-area"  name="password" required><br>
            <input type="submit" class="input-area submit"  name="submit" value="log in">
        </form>
    </div>
</body>
</html>
