<?php
    require('db_connect.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    $submit = $_POST['submit'];

    if(!empty($submit)){
        $pdo = db_connect();
        try{
            $sql = 'INSERT INTO posts (title, content) VALUES(:title, :content)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->execute();
            //登録したらmain.phpへ戻る
            header('Location:main.php');
            exit;
        }catch(PDOException $e){
            echo $e->getMessage();
            die();

        }
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>新規登録</div>
    <div>
        <form action="" method="POST">
            <input type="text" class="input-area" name="title" placeholder="title" required><br>
            <input type="text" class="input-area"  name="content" placeholder="content" required><br>
            <input type="submit" class="input-area submit"  name="submit" value="登録">
        </form>
    </div>
</body>
</html>
