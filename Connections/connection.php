<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connection = "10.35.16.157";
$database_connection = "webmain";
$username_connection = "root";
$password_connection = "Fowel Condition";
$connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>