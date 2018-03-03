<?php
// Ket noi toi sever
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$sql="CREATE TABLE kadai215(
id INT UNIQUE AUTO_INCREMENT,
name char(32),
comment TEXT,
password char(32),
timephp char(32))";
$result = $pdo->query($sql);

?>