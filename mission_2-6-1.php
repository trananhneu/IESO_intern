<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

//SUA VAN BAN
if (isset($_POST['submit2']) && ($_POST['NumberToEdit'])!= 0){
	$NumberToEditSended = $_POST['NumberToEdit'];
	$Name = $_POST['name2-3'];
	$Comment = $_POST['comment2-3'];
	$PasswordEdit = $_POST['PasswordEdit'];
	$path = 'kadai26.txt';
	$array = file($path);
	unlink($path);
	$fp = fopen($path, 'a');
	foreach ($array as $key){
		$key = explode("<>", $key);
		if (($key[0] == $NumberToEditSended)&&($PasswordEdit ==$key[3])){
			$key[1] = $Name;
			$key[2] = $Comment;
			var_dump($key[1]);
			var_dump($key[2]);
		}
		$ConversionToText = implode("<>", $key);
		fwrite($fp, $ConversionToText);
	}
	fclose($fp);
}

//HIEN THI TOAN BO FILE
if (isset($_POST['button'])) {
	$path = 'kadai26.txt';
	$array = file($path);
	foreach ($array as $key){
		$key = explode("<>", $key);
		foreach ($key as $key_2) {
			echo $key_2." ";
		}
		echo "<br>";
	}
}

//KIEM TRA SO CUA DONG MUON SUA
if (isset($_POST['number_edit'])) {
	$NumberToEdit = $_POST['number_edit'] ;
	$path = 'kadai26.txt';	
	$fp = fopen($path, 'a');
	$array = file($path);
	foreach ($array as $key ) {
	$key = explode("<>", $key);
	if ($key[0] == $NumberToEdit) {
		$NAME_TO_HTML = $key[1];
		$COMMENT_TO_HTML = $key[2];
		var_dump($COMMENT_TO_HTML);
		var_dump($NAME_TO_HTML);
	}
}}else{
	$NAME_TO_HTML = "";
	$COMMENT_TO_HTML = "";
	$NumberToEdit = 0;
}
//KIEM TRA SO DE XOA DONG
if (isset($_POST['submit_bango'])) {
	$NUMBER = $_POST['bango'] ;
	$PasswordDel = $_POST['PasswordDel'];
	var_dump($NUMBER);
	$path = 'kadai26.txt';	
	$array = file($path);
	unlink($path);
	$fp = fopen($path, 'a');
	foreach ($array as $key ) {
	$key = explode("<>", $key);
	
	if (($key[0] == $NUMBER)&&($key[3] ==$PasswordDel)) {
		echo "Deleted line: ". $NUMBER;
		
	} else {
	//NEU KHAC SO THI GI VA HIEN THI FILE
		$key2 = implode('<>', $key);
		fwrite($fp, $key2);	
		var_dump($key);
		echo '<br>';
		echo $key2;
		}
	}
	fclose($fp);

}
//TAO 3 BIEN GIA TRI VA GHI VAO FILE
if (!empty($_POST['name2-2'])&& !empty($_POST['comment2-2']) && !empty($_POST['PasswordNew'])){
var_dump($_POST['name2-2']);	
$NAME = $_POST['name2-2'];
$COMMENT = $_POST['comment2-2'];
$PasswordNew = $_POST['PasswordNew'];
//TAO BIEN THOI GIAN
$TIME = new DateTime();
$TIME = $TIME->format('Y/s/d H:i:s');
//TAO BIEN DEM
$path = 'kadai26.txt';
$array = file($path);
$input_times=count($array) + 1;
//TAO FILE TEXT VAO GHI FILE

$fp = fopen($path, 'a');
fwrite($fp, ($input_times.'<>'.$NAME.'<>'.$COMMENT.'<>'.$PasswordNew."<>".$TIME."\n"));
fclose($fp);
} 
	

?>

<html>
<title>Welcome to disney world</title>
<body>
	
	<form method = "POST" action = "mission_2-6-1.php">
	
	
	Your text you want to edit<br>
	<i>Enter the number of line first</i><br>
	<input type = "text" name = "name2-3" value="<?=$NAME_TO_HTML?>"><br>
	
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-3" rows = "8" ><?=$COMMENT_TO_HTML?></textarea><br>
	<input type = 'hidden' name ='NumberToEdit' value = "<?=$NumberToEdit?>">
	Password<br>
	<input type = 'Password' name = "PasswordEdit"><br>
	<input type = 'submit' name = 'submit2'><br><br>
	
	
	View all the file<br>
	<input type = 'submit' name = 'button'><br><br>
	
	------------------------------<br>
	
	Enter the number of line you want to edit<br>
	<input type = "text" name = "number_edit" /><br>
	<input type = 'submit' name = 'button2'><br><br>

	-----------------------------<br>
	Enter the number of line you want to delete<br>
	
	<input type = 'text' name = 'bango'><br><br>
	Password<br>
	<input type="Password" name="PasswordDel" ><br>
	<input type ='submit' name = 'submit_bango'><br>
	
	
	--------------------------------<br>
	If you want to add new comment<br>
	<input type = "text" name = "name2-2"><br>
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-2" rows = "8" placeholder = "Fill your hobies in here"></textarea><br>
	Password<br>
	<input type="Password" name="PasswordNew" /><br>
	<input type = 'submit' name = 'submit' ><br><br>
	
	</form>
</body>
</html>