<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

//SUA VAN BAN
if (isset($_POST['submit2']) && ($_POST['NumberToEdit'])!= 0){
	$NumberToEditSended = $_POST['NumberToEdit'];
	$Name = $_POST['name2-3'];
	$Comment = $_POST['comment2-3'];
	$path = 'kadai23.txt';
	$array = file($path);
	unlink($path);
	$fp = fopen($path, 'a');
	foreach ($array as $key){
		$key = explode("<>", $key);
		if ($key[0] == $NumberToEditSended){
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
	$path = 'kadai23.txt';
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
	$path = 'kadai23.txt';	
	$array = file($path);
	$fp = fopen($path, 'a');
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
	var_dump($NUMBER);
	$path = 'kadai23.txt';	
	$array = file($path);
	unlink($path);
	$fp = fopen($path, 'a');
	foreach ($array as $key ) {
	$key = explode("<>", $key);
	if ($key[0] == $NUMBER) {
		echo 'Deleted line number'. $NUMBER .'with content: ' .$key.'<br>';
		
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
if (!empty($_POST['name2-2'])&& !empty($_POST['comment2-2'])){
var_dump($_POST['name2-2']);	
$NAME = $_POST['name2-2'];
$COMMENT = $_POST['comment2-2'];
//TAO BIEN THOI GIAN
$TIME = new DateTime();
$TIME = $TIME->format('Y/s/d H:i:s');
//TAO BIEN DEM
$count_file = "index.log";
$cf = fopen($count_file, 'r');
$input_times = fread($cf,filesize($count_file));

$input_times++;
$cf = fopen($count_file, 'w');
fwrite($cf, $input_times);
fclose($cf);
//TAO FILE TEXT VAO GHI FILE
$path = 'kadai23.txt';
$fp = fopen($path, 'a');
fwrite($fp, ($input_times.'<>'.$NAME.'<>'.$COMMENT.'<>'.$TIME."\n"));
fclose($fp);
} 
	

?>

<html>
<title>Welcome to disney world</title>
<body>
	テスト
	<form method = "POST" action = "mission_2-5.php">
	
	<b>Your text you want to edit</b><br>
	<i>(Enter you number of line first)</i><br>
		Your name<br>
	<input type = "text" name = "name2-3" value="<?=$NAME_TO_HTML?>"><br>
	
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-3" rows = "8" ><?=$COMMENT_TO_HTML?></textarea><br>
	<input type = 'hidden' name ='NumberToEdit' value = "<?=$NumberToEdit?>">
	<input type = 'submit' name = 'submit2'><br><br>
	------------------------------<br>
	View all the file<br>
	<input type = 'submit' name = 'button'><br><br>
	<input type = 'hidden' name="hidden_input" value="EDIT">
	------------------------------<br>
	
	Enter the number of line you want to edit<br>
	<input type = "text" name = "number_edit" /><br>
	<input type = 'submit' name = 'button2'><br><br>
	
	--------------------------------<br>
	If you want to add new comment<br>
	<input type = "text" name = "name2-2"><br>
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-2" rows = "8" placeholder = "Fill your hobies in here"></textarea><br>
	<input type = 'submit' name = 'submit' ><br><br>
	</form>
</body>
</html>