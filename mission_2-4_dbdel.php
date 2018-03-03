<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
	<a href="mission_2-2_dbsave.php">Input form</a><br>
	<a href="mission_2-5_dbedit.php">Edit</a><br>
	------------------------------<br>
	Enter the number of line you want to delete<br>
	<form action = "mission_2-4_dbdel.php" method="POST">
	<input type = 'number' name = 'bango' min="1"><br><br>
	Password<br>
	<input type="text" name="PasswordDel" ><br>
	<input type ='submit' name = 'submit_bango'><br>
	</form>
	-----------------------------<br>
	
	</form>
</body>
</html>
<?php
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);

//HIEN THI TOAN BO DATABASE
$sql = 'SELECT * FROM kadai215 ORDER BY id';
$result = $pdo->query($sql);

echo '<table border="1" >';
echo '<tr><th>Number</th><th>Name</th><th>Comment</th><th>Password</th><th>Time</th></tr>';
foreach ($result as $key ) {
	echo "<tr>";
	echo "<td>".$key['id']."</td>"."<td>".$key['name']."</td>"."<td>".$key['comment']."</td>"."<td>".$key['password']."</td>"."<td>".$key['timephp'].'</td>';
	echo "</tr>";
}
echo "</table>";

//THEM HAM KIEM TRA XEM PHAI SO HAY KHONG
if (isset($_POST['submit_bango']) ) {
	$NUMBER_DEL = $_POST['bango'] ;
	$PasswordDel = "'".$_POST['PasswordDel']."'";
	$sql_del = "DELETE FROM kadai215 WHERE (id=$NUMBER_DEL AND password=$PasswordDel)";
	$result = $pdo->query($sql_del);
	if($result){echo "OK";}
	//IN RA MAN HINH NEU SAI SO HOAC PASSWORD
	
}

	//$sql = "DELETE FROM kadai215 WHERE (id= $NUMBER_DEL AND password='$PasswordDel')";
	// $result = $pdo->query($sql_del);


	
?>
