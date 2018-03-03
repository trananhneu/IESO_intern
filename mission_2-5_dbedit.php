<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);
//SUA VAN BAN
//Them dieu kien passwor & space
if (isset($_POST['submit2']) && ($_POST['NumberToEdit'])!= 0 ){
	if(!empty($_POST['name2-3']) && !empty($_POST['comment2-3']) && !ctype_space($_POST['name2-3']) &&!ctype_space($_POST['comment2-3']) ){
	$NumberToEditSended = $_POST['NumberToEdit'];
	$Name = $_POST['name2-3'];
	$Comment = $_POST['comment2-3'];
	$PasswordEdit = $_POST['PasswordEdit'];
	//KIEM TRA XEM CO DUNG PASSWORD HAY KHONG

	
	//GHI VAO DATABASE
	$sql_edit = "UPDATE kadai215 SET name='$Name', comment='$Comment' WHERE (id=$NumberToEditSended AND password='$PasswordEdit') ";
	$result = $pdo->query($sql_edit);
	$count_test_password = $result->rowCount();
	if($count_test_password){echo '<b>Updated</b><br>';} else{echo '<b>Wrong Password</b><br>';}
	
	$NAME_TO_HTML = "";
	$COMMENT_TO_HTML = "";
	$NumberToEdit = 0;
} else{ echo "Blank or only space field is not accept";}
}

//TRUONG HOP KHONG NHAP SO MA AN EDIT LUON
if (isset($_POST['submit2']) && ($_POST['NumberToEdit'])==0){
	echo "<b>Please enter the number first</b><br>";
}

//KIEM TRA SO CUA DONG MUON SUA
if(!empty($_POST['number_edit'])) {
	
	$NumberToEdit = $_POST['number_edit'] ;
	
	//them bien dem de thong bao khi khong co so phu hop
	$count_invalid_number = 0;
	$NAME_TO_HTML = "";
	$COMMENT_TO_HTML = "";
	$sql = 'SELECT * FROM kadai215';
	$result = $pdo->query($sql);
	foreach ($result as $key ) {
	
	if ($key[0] == $NumberToEdit) {
		$NAME_TO_HTML = $key['name'];
		$COMMENT_TO_HTML = $key['comment'];
		$count_invalid_number++;
		
	} 
	

	}
if($count_invalid_number == 0){echo "<b>Invalid number</b><br>";
}
}
else{
	$NAME_TO_HTML = "";
	$COMMENT_TO_HTML = "";
	$NumberToEdit = 0;
}


?>

<html>
<title>Welcome to disney world</title>
<body>
	<a href="mission_2-2_dbsave.php">Input form</a><br>
	<a href="mission_2-4_dbdel.php">Delete row</a><br>
	
	-------------------------------<br>
	<form method = "POST" action = "mission_2-5_dbedit.php">
	Enter the number of line you want to edit<br>
	<input type = "number" name = "number_edit" min="1" /><br>
	<input type = 'submit' name = 'button2'><br><br>
	
	--------------------------------<br>
	<b>Your text you want to edit</b><br>
	Your name<br>
	<input type = "text" name = "name2-3" value="<?=$NAME_TO_HTML?>"><br>
	
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-3" rows = "8" ><?=$COMMENT_TO_HTML?></textarea><br>
	<input type = 'hidden' name ='NumberToEdit' value = "<?=$NumberToEdit?>">
	Password<br>
	<input type="Password" name="PasswordEdit" ><br>
	<input type = 'submit' name = 'submit2'><br><br>
	------------------------------<br>
		
	
</body>
</html>
<?php

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
?>