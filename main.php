<?php
    require('db_connect.php');

    try{
        $pdo = db_connect();
        $sql = 'select * from posts';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }catch(PDOException $e){
        echo $e->getMessage();
        die();      
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>メインページ</title>
</head>
<body>
    <h1>メインページ</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">記事ID</th>
                <th scope="col">タイトル</th>
                <th scope="col">本文</th>
                <th scope="col">作成日</th>
                <th scope="col">編集</th>
                <th scope="col">削除</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><a href="edit.php?id=<?php echo $row['id'];?>">編集</a></td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="create.php">新規登録する</a>
</body>
</html>
