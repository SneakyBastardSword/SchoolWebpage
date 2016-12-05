<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="5; URL='/dev/upload.php'" />


<title>Upload</title>
<link type="text/css" href="/dev/dev.css" rel="stylesheet"/>
</head>

<body>

<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	function generateRandomString($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	$link = 'localhost';
	$user = 'root';
	$password = 'Fowel Condition';
	$database = 'webmain';
	$table = 'slideshow';
	
	$connection = mysqli_connect($link,$user,$password,$database);
	
	if(isset($_FILES['image'])){
		$type = mime_content_type($_FILES['image']['tmp_name']);
		$id = generateRandomString();
		$name = $_POST['title'];
		$description = $_POST['description'];
		$type = explode("/",$type);
		$query = mysqli_query($connection, "INSERT INTO `webmain`.`slideshow` (`name`, `id`, `type`, `description`) VALUES ('{$name}', '{$id}','{$type[1]}', '{$description}');");
		echo mysqli_error($connection);
		
		$uploadDir = "c:/inetpub/wwwroot/src";
		move_uploaded_file($_FILES['image']['tmp_name'],"{$uploadDir}/{$id}.{$type[1]}");
		echo "Image uploaded, returning to upload form in 5 seconds";
		sleep(5);		
	}else{
		print("No file receved! Redirecting back to upload in 5 seconds");
	}
	die('<script type="text/javascript">window.location.reload();</script>');
?>

</body>
</html>