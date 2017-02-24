<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image Upload</title>
<link type="text/css" href="/dev/dev.css" rel="stylesheet"/>
</head>

<body>

<form method="post" action="upload.php" enctype="multipart/form-data">
	
    Title: <input type="text" name="title"/><br />
    Desc: <textarea name="description"></textarea><br />
    File: <input type="file" name="image"/><br />
    <button>submit</button>
</form>

</body>
</html>