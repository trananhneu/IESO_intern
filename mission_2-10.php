<?php
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$sql='SHOW CREATE TABLE tbtest';
$result=$pdo->query($sql);
foreach($result as $row){
	print_r($row);
}
echo"<hr>"
?>