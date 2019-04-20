<html>
	<head>
		<title> Cloud Sound </title>
	</head>
	<body>
		<form enctype="multipart/form-data" action="sound_action.php" method="POST">
			<input type="hidden" name="MAX_FILE_SIZE"/>
			Choose a file to upload: <input name="file" type="file" /><br />
			<input type="submit" value="Upload File" />
		</form>
		<form enctype="multipart/form-data" action="sound_del_action.php" method="POST">
			<input type="submit" value="Delete all Audio files" />
		</form>
		<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
		
<?php
$dir = "upload/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
	 
    while (($file = readdir($dh)) !== false){
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if(strcmp($ext,".mp3")){
		echo "<p>filename:" . $file . "</p><br>";
		echo "<audio controls>";
		echo "<source src='upload/".$file."' type='audio/mp3'>";
		echo "</audio>";
		}
    }
    closedir($dh);
  }
}
?>

<footer>Copyright<small>&copy;</small>2018 - Yogesh Gupta</footer>
	</body>
</html>

