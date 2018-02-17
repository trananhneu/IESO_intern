<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
	<a href="mission_2-2_save.php">Input form</a><br>
	<a href="mission_2-3_view.php">View File</a><br>
	<a href="mission_2-5_edit.php">Edit</a><br>
	------------------------------<br>
	Enter the number of line you want to delete<br>
	<form action = "mission_2-4_del.php" method="POST">
	<input type = 'number' name = 'bango' min="1"><br><br>
	Password<br>
	<input type="Password" name="PasswordDel" ><br>
	<input type ='submit' name = 'submit_bango'><br>
	</form>
	-----------------------------<br>
	
	</form>
</body>
</html>
<?php

//THEM HAM KIEM TRA XEM PHAI SO HAY KHONG
if (!empty($_POST['bango'])) {
	$NUMBER = $_POST['bango'] ;
	$PasswordDel = $_POST['PasswordDel'];

	$path = 'text22.txt';
	//KIEM TRA FILE CO TON TAI	
	if (file_exists($path)){
		$array = file($path);
			unlink($path);
			$fp = fopen($path, 'a');
			//them bien dem de thong bao khi khong co so phu hop
	 		$count_invalid_number = 0;
			foreach ($array as $key ) {
			$key = explode("<>", $key);
			echo $key[3];
				if ($key[0] == $NUMBER && $key[3] == $PasswordDel) {
					$count_invalid_number++;
					echo 'Deleted line number'. $NUMBER .'<br>';
					
				} else {
				//NEU KHAC SO THI GI VA HIEN THI FILE
					$key2 = implode('<>', $key);
					fwrite($fp, $key2);	
					}
			}
			fclose($fp);	
		if($count_invalid_number == 0){echo "<b>Invalid number or wrong password</b><br>";}
	} else {echo "File is not exists. Please enter new data first";}

}
	
?>
