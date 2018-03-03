<?php
//Ket noi toi sever
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$id = 1;
$sql = "delete from tbtest where id=$id";
$result=$pdo->query($sql);
?>