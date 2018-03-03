<?php
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$sql ='SHOW TABLES';
$result = $pdo -> query($sql);
foreach ($result as $row){
 echo $row[0];
 echo '<br>';
 var_dump($result);
}
echo "<hr>";
?>