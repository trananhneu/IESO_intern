<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<?php

//SUA VAN BAN
//Them dieu kien passwor & space
if (isset($_POST['submit2']) && ($_POST['NumberToEdit'])!= 0 ){
	if(!empty($_POST['name2-3']) && !empty($_POST['comment2-3']) && !ctype_space($_POST['name2-3']) &&!ctype_space($_POST['comment2-3']) ){
	$NumberToEditSended = $_POST['NumberToEdit'];
	$Name = $_POST['name2-3'];
	$Comment = $_POST['comment2-3'];
	$PasswordEdit = $_POST['PasswordEdit'];
	$path = 'text22.txt';
	$array = file($path);
	unlink($path);
	$fp = fopen($path, 'a');
	foreach ($array as $key){
		$key = explode("<>", $key);
		if($key[0] == $NumberToEditSended && $key[3] == $PasswordEdit){
			$key[1] = $Name;
			$key[2] = $Comment;
			echo "<b>Edited</b>";
		}
		$ConversionToText = implode("<>", $key);
		fwrite($fp, $ConversionToText);
		if($key[0] == $NumberToEditSended && $key[3] != $PasswordEdit){echo "<b>Wrong password!</b><br>";}
	}
	fclose($fp);
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
	$path = 'text22.txt';	
	$array = file($path);
	$fp = fopen($path, 'a');
	//them bien dem de thong bao khi khong co so phu hop
	$count_invalid_number = 0;
	$NAME_TO_HTML = "";
	$COMMENT_TO_HTML = "";
	foreach ($array as $key ) {
	$key = explode("<>", $key);
	if ($key[0] == $NumberToEdit) {
		$NAME_TO_HTML = $key[1];
		$COMMENT_TO_HTML = $key[2];
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
	<a href="mission_2-2_save.php">Input form</a><br>
	<a href="mission_2-4_del.php">Delete row</a><br>
	<a href="mission_2-3_view.php">View File</a><br>
	-------------------------------<br>
	<form method = "POST" action = "mission_2-5_edit.php">
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