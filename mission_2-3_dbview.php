<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
<a href="mission_2-2_save.php">Input form</a><br>
<a href="mission_2-4_del.php">Delete row</a><br>
<a href="mission_2-5_edit.php">Edit</a><br>
-------------------------------<br>	
</body>
</html>
<?php
// TRUY CAP SEVER
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);

//HIEN THI TOAN BO DATABASE
$sql = 'SELECT * FROM kadai215';
$result = $pdo->query($sql);
foreach ($result as $key ) {
	echo $key['id'].'|'.$key['name'].'|'.$key['comment'].'|'.$key['password'].'|'.$key['timephp'].'<br />';
}

?>
