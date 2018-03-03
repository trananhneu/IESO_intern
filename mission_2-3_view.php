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
//HIEN THI TOAN BO FILE

$path = 'text22.txt';
if(file_exists($path)){
	echo"Text file: <br>";
	echo "---------------------------<br>";
	$array = file($path);
	foreach ($array as $key){
	$key = explode("<>", $key);
	foreach ($key as $key_2) {
		echo $key_2." ";
	}
	echo "<br>";
}
} else {
	Echo "File is not exists. Please enter new data first";
}





?>
