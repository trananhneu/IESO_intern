<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
	テスト
	<form method = "POST" action = "mission_2-4.php">
	Please fill in both fields<br>
	<input type = "text" name = "name2-2"><br>
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-2" rows = "8" placeholder = "Fill your hobies in here"></textarea><br>
	<input type = 'submit' name = 'submit'><br><br>
	View all the file<br>
	<input type = 'submit' name = 'button'><br><br>
	------------------------------<br>
	Enter the number of line you want to delete<br>
	
	<input type = 'text' name = 'bango'><br><br>
	<input type ='submit' name = 'submit_bango'><br>

	-----------------------------<br>
	
	</form>
</body>
</html>
<?php
//HIEN THI TOAN BO FILE
if (isset($_POST['button'])) {
	$path = 'kadai23.txt';
	$array = file($path);
	var_dump($array);
	foreach ($array as $key){
		$key = explode("<>", $key);
		foreach ($key as $key_2) {
			echo $key_2." ";
		}
		echo "<br>";
	}
}
// if (isset($_POST['button'])) {
// 	$path = 'kadai23.txt';
// 	$fp = fopen($path, 'r');
// 	$data = fread($fp, filesize($path));
// 	echo $data;
// 	fclose($fp);
// }
//THEM HAM KIEM TRA XEM PHAI SO HAY KHONG
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
	
//TAO 3 BIEN GIA TRI VA KIEM TRA 
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
//DOC FILE VA GHI RA MAN HINH
// $array = file($path);
// foreach ($array as $key ) {
// 	$key = explode("<>", $key);
// 	foreach ($key as $key_2) {
// 		echo $key_2. " ";
// 	}
// 	echo "<br>";

// }
} else {
	echo 'Please fill all the fields';
}




?>
