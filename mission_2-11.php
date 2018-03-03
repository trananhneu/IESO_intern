<?php
//Ket noi toi sever
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$sql = $pdo -> prepare("INSERT INTO tbtest (id,name, comment) VALUES ('1',:x, :y)"); 
$sql -> bindParam(':x', $name, PDO::PARAM_STR);
$sql -> bindParam(':y', $comment, PDO::PARAM_STR);  
$name = '好きな名前1';
$comment = '好きなコメント2';
$sql -> execute();
?>