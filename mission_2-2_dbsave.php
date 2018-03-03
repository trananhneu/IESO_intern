<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
	<a href="mission_2-5_dbedit.php">Edit</a><br>
	<a href="mission_2-4_dbdel.php">Delete row</a><br>
	-------------------------------<br>	
	<form method = "POST" action = "mission_2-2_dbsave.php">
	Your name<br>
	<input type = "text" name = "name2-2"><br>
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-2" rows = "8" placeholder = "Fill your hobies in here"></textarea><br>
	Password<br>
	<input type="Password" name="PasswordNew" /><br>
	<input type = 'submit' name = 'submit'><br>
	-----------------------------<br>
	
	</form>
</body>
</html>
<?php
// TRUY CAP SEVER
$dsn = 'mysql:dbname=test;host=localhost';
$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);
//TAO BIEN GIA TRI VA KIEM TRA 

if (!empty($_POST['name2-2'])and !empty($_POST['comment2-2'])&& !empty($_POST['PasswordNew']) ){
if(!ctype_space($_POST['PasswordNew']) and !ctype_space($_POST['name2-2']) and !ctype_space($_POST['comment2-2'])){
$NAME = $_POST['name2-2'];
$COMMENT = $_POST['comment2-2'];
$PasswordNew = $_POST['PasswordNew'];

//TAO BIEN THOI GIAN
date_default_timezone_set('Asia/Tokyo');
$TIME = new DateTime();
$TIME = $TIME->format('Y/s/d H:i:s');

/*GHI VAO DATABASE
 *NOI DUNG $fp, $input_times.'<>'.$NAME.'<>'.$COMMENT.'<>'.$PasswordNew."<>".$TIME."\n"
 */
$sql = $pdo->prepare("INSERT INTO kadai215(name, comment, password, timephp ) VALUES(:name, :comment, :password, :timephp)");
$sql->bindParam(':name',$NAME, PDO::PARAM_STR);
$sql->bindParam(':comment', $COMMENT, PDO::PARAM_STR);
$sql->bindParam(':password', $PasswordNew, PDO::PARAM_STR);
$sql->bindParam(':timephp', $TIME, PDO::PARAM_STR);
$sql->execute();


echo "Saved: ". $NAME." ".$COMMENT." ".$PasswordNew." ".$TIME." to database<br>";
} else{ echo "<b>!Name or comment or password with only space is not accept </b>";
} 
}
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
//NOTICE IN BROWSER 
if ((empty($_POST['name2-2']) or empty($_POST['comment2-2'])or empty($_POST['PasswordNew'])) && isset($_POST['submit'])){
	echo "<b>!Fill all the field</b>";
}






?>
