<?php
//Ket noi toi sever
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);
if($pdo){echo "Conected";}
$sql = 'SELECT * FROM tbtest';
$results = $pdo -> query($sql);
foreach ($results as $row){
    //$rowの中にはテーブルのカラム名が入る
    echo $row['id'].',';
    echo $row['name'].',';
    echo $row['comment'].'<br>';
}
?>