<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
	<a href="mission_2-3_view.php">View File</a><br>
	<a href="mission_2-4_del.php">Delete row</a><br>
	<a href="mission_2-5_edit.php">Edit</a><br>
	-------------------------------<br>	
	<form method = "POST" action = "mission_2-2_save.php">
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
//TAO BIEN GIA TRI VA KIEM TRA 


if (!empty($_POST['name2-2'])and !empty($_POST['comment2-2'])&& !empty($_POST['PasswordNew']) ){
if(!ctype_space($_POST['PasswordNew']) and !ctype_space($_POST['name2-2']) and !ctype_space($_POST['comment2-2'])){
$NAME = $_POST['name2-2'];
$COMMENT = $_POST['comment2-2'];
$PasswordNew = $_POST['PasswordNew'];

//TAO BIEN DEM
$count_file = "index1.log";
if (file_exists($count_file)){
	$cf = fopen($count_file, 'r');
	if ($cf){
	$input_times = fread($cf, filesize($count_file));
	$input_times++;
	$cf = fopen($count_file, 'w');
	fwrite($cf, $input_times);
	fclose($cf);

}
} else {
	$cf = fopen($count_file, 'w');
	$input_times = 1;
	fwrite($cf, $input_times);
	fclose($cf);
}


//TAO BIEN THOI GIAN
$TIME = new DateTime();
$TIME = $TIME->format('Y/s/d H:i:s');

//TAO FILE TEXT VAO GHI FILE
$path = 'text22.txt';
$fp = fopen($path, 'a');
fwrite($fp, $input_times.'<>'.$NAME.'<>'.$COMMENT.'<>'.$PasswordNew."<>".$TIME."\n");
fclose($fp);
echo "Saved: ". $input_times." ". $NAME." ".$COMMENT." ".$PasswordNew." ".$TIME." to text file";
} else{ echo "<b>!Name or comment or password with only space is not accept </b>";
} 
}
//NOTICE IN BROWSER 
if ((empty($_POST['name2-2']) or empty($_POST['comment2-2'])or empty($_POST['PasswordNew']) && isset($_POST['submit']))){
	echo "<b>!Fill all the field</b>";
}






?>
