<?php
//Ket noi toi sever
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$id = 1;
$nm = "好きな名前";
$kome = "好きな言葉";
$sql = "update tbtest set name=$nm, comment=$kome where id = $id";
$result = $pdo->query($sql);

// $nm = 'abc';　$kome = "好きな言葉";
// echo $nm;
// $sql = "update tbtest set name='$nm' , comment=$kome where id = $id"; 

// $result = $pdo->query($sql);

?>

