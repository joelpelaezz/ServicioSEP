<?PHP
$hostname_localhost ="localhost";
$database_localhost ="sep";
$username_localhost ="tecnomatico";
$password_localhost ="tecnojava2013";
$localhost = mysql_connect($hostname_localhost,$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($database_localhost, $localhost);

$imagen=$_POST['imagen'];

$query_search = "insert into imagen(imagen) values ('".$imagen."')";
$query_exec = mysql_query($query_search) or die(mysql_error());

mysql_close($localhost);
?>