ハロー
<?php
    require('db_connect.php');

    $id = $_GET['id'];
    
    try{
        $pdo = db_connect();
        $sql = 'select * from posts where id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e->getMessage();
    }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集ページ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div>編集ページ</div>
    <div>
        <form action="edit_done.php" method="POST">
            <input type="text" class="input-area" name="title" placeholder="title" value="<?php echo $row['title']; ?>"><br>
            <input type="text" class="input-area"  name="content" placeholder="content" value="<?php echo $row['content']; ?>"><br>
            <input type="submit" class="input-area submit"  name="submit" value="登録">
        </form>
    </div>
</body>
</html>
