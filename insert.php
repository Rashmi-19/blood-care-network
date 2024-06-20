<!Doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<?php
include "connection.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
 $inId=$_POST["t1"];
 $inName=$_POST["t2"];
 $inAge=$_POST["t3"];
 $inSex=$_POST["t4"];
 $inMob=$_POST["t5"];
 $inBg=$_POST["t6"];
 $inCity=$_POST["t7"];
 $sql="insert into register values('".$inName."','".$inAge."','".$inSex."','".$inMob."','".$inBg."','".$inCity."')";
if(mysqli_query($conn,$sql))
{
	echo"Record saved";
}
else
{
	echo"Error in inserting data: ".mysqli_error($conn);
}
mysqli_close($conn);
}
?>