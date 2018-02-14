<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<html>
<title>Welcome to disney world</title>
<body>
	テスト
	<form method = "POST" action = "mission_2-2.php">
	Please fill in both fields<br>
	<input type = "text" name = "name2-2"><br>
	Your hobies.. <br>
	<textarea id = "id_comment" name = "comment2-2" rows = "8" placeholder = "Fill your hobies in here"></textarea><br>
	<input type = 'submit' name = 'submit'><br>
	-----------------------------<br>
	<b>Your name and your comment</b>
	</form>
</body>
</html>
<?php
//TAO BIEN GIA TRI VA KIEM TRA 

if (isset($_POST['name2-2'])and isset($_POST['comment2-2'])){
$NAME = $_POST['name2-2'];
$COMMENT = $_POST['comment2-2'];

//TAO BIEN DEM
$count_file = "index.log";
$cf = fopen($count_file, 'r');
$input_times = fread($cf,filesize($count_file));
var_dump($input_times);
$input_times++;
$cf = fopen($count_file, 'w');
fwrite($cf, $input_times);
fclose($cf);
} else {
	echo 'Please fill all the fields';
}
//TAO BIEN THOI GIAN
$TIME = new DateTime();
$TIME = $TIME->format('Y/s/d H:i:s');



//TAO FILE TEXT VAO GHI FILE
$path = 'kadai22.txt';
$fp = fopen($path, 'a');
fwrite($fp, $input_times.'<>'.$NAME.'<>'.$COMMENT.'<>'.$TIME."\n");
fclose($fp);
?>
