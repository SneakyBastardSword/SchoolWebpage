<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Management</title>
<link type="text/css" rel="stylesheet" href="/dev/dev.css"/>
</head>

<body>

<?php
	$link = 'localhost';
	$user = 'root';
	$password = 'Fowel Condition';
	$database = 'webmain';
	$table = 'slideshow';
	
	$connection = mysqli_connect($link,$user,$password,$database);

	if(isset($_POST['submit'])){
		if($_POST['actionType'] == 'remove'){
			for($i=0; $i<sizeof($_POST['imageSelection']); $i++){
				$query = "DELETE FROM `{$database}`.`{$table}` WHERE `id`=\"{$_POST['imageSelection'][$i]}\"";
				mysqli_query($connection, $query);
			}
		}
	}	
	mysqli_close($connection);
?>

<form method="post">
<div>
	<select name="actionType">
    	<option value="remove">delete</option>
    </select>
	<button name="submit" value="true">Do action</button>
</div>
<?php
	
	$link = 'localhost';
	$user = 'root';
	$password = 'Fowel Condition';
	$database = 'webmain';
	$table = 'slideshow';
	
	$connection = mysqli_connect($link,$user,$password,$database);
	
	$query = mysqli_query($connection, "SELECT * FROM `webmain`.`slideshow`");
	
	$idArray[0] = '';
	$typeArray[0] = '';
	if (mysqli_num_rows($query)>0){
		$count = 0;
		while($result = mysqli_fetch_assoc($query)){
			 $idArray[$count] = "{$result['id']}";
			 $typeArray[$count] = "{$result['type']}";
			 $count++;
		}
	}
	
	for ($i=0; $i<sizeof($idArray); $i++){
		echo "<div class=\"selector\"><img src=\"/src/{$idArray[$i]}.{$typeArray[$i]}\" class=\"selectorImage\"/><input type=\"checkbox\" class=\"checkbox\" name=\"imageSelection[]\" value=\"{$idArray[$i]}\" /></div>";
	}
	mysqli_close($connection);
?>
</form>
</body>
</html>