<?php
    //DB名
    define('DB_DATABASE', 'todo-search');
    //Mysqlのユーザー名
    define('DB_USERNAME', 'root');
    //Mysqlのログインパスワード
    define('DB_PASSWORD', 'root');
    //DNS
    define('DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

    function db_connect(){
        try{
            //PDOインスタンスの作成
            $pdo = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }


?>