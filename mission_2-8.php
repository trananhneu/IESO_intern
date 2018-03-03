<?php
//Ket noi toi sever
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
$sql= "CREATE TABLE tbtest"
." ("
. "id INT,"
. "name char(32),"
. "comment TEXT"
.");";
$stmt = $pdo->query($sql);
    echo "Tạo table thành công";


?>