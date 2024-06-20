<!Doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>
<?php
include "connection.php";
$inCity=$_POST["t7"];
$inBg=$_POST["t6"];
$sql="select * from donor where (t4='".$inCity."' && t5='".$inBg."')";

$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo "Name: ".$row["t2"]."-Phone number: ".$row["t5"]."-City: ".$row["t7"]."-Blood Group: ".$row["t6"]."<br>";}
}
else
{
echo "0 results";
}
mysqli_close($conn);
?>
</body>
</html>