<!DOCTYPE html>
<html>

<body>


<?php
$q = intval($_GET['q']);
	$DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'KhairKsa';
	
	
	//Connect to mysql server
	$con = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
	
	//Select database
	$db = mysql_select_db($DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
mysql_query("SET NAMES 'utf8'");


$qry="SELECT * FROM cities WHERE region ='".$q."'";
$result = mysql_query($qry); 
if($result)
while($info = mysql_fetch_array( $result )) 
Print '<option value='.$info['id'].'>'.$info['city'].'</option>';


?>




</body>
</html>