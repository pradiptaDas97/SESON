<?php
include_once("dbconfig.php");
$selectdb = mysqli_select_db($connection, 'phpajax');
if(!$selectdb){
	die("Database Selection Failed" . mysqli_error($connection));
}
$city=$_GET['city'];
$b_id=$_GET['serv'];
$sql="SELECT `sl num`,`bussiness-name` FROM `bussines` WHERE `city`=$city AND `bussines-type-id`=$b_id";
$result = mysqli_query($connection, $sql);
	
while($row = mysqli_fetch_assoc($result)){
	echo "<option value='" . $row['sl num'] . "'>" . $row['bussiness-name'] ."</option>";
}
 
?>
