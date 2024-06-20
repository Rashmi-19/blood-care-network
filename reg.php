<!DOCTYPE html>
<html>
<body bgcolor="white">
<link rel="stylesheet" type="text/css" href="style.css"/>
<div class="topnav">
 <a class="active " href="Home.php">Home</a>
 <a class="active " href="reg.php">Register</a>
 <a class="active " href="search1.php">Search</a>
 <a class="active" href="donor.php" >Details</a>
 <a class="active " href="logout.php" style="float:right;">Log Out</a>
 <a class="active " href="contact.php" style="float:right;">Contact</a>
</div>
<style>
    .container{
        background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1D6PUYsrsQfsmb9-WnwJCVx44fEfFGfsFTQ&usqp=CAU");
        background-size:cover;
        height:80vh;
        width:70vw;
    }
</style>
<tr>
<td><br></td>
</tr><tr>
<td><br></td>
</tr>
<tr>
<td><br></td>
</tr>
<form action=" " method="post" name="register">
<center>


<div class="container">
<table>
<tr>
<td><br></td>
</tr>
<tr>
                    <td><font size="6">Id:</font></td>
                    <td><input type="text" name="donor_id" required></input></td>
                </tr>

                <tr>
                    <td><font size="6">Name:</font></td>
                    <td><input type="text" name="dname" required></input></td>
                </tr>
                <tr>
                    <td><font size="6" >Age:</font></td>
                    <td><input type="text" name="dage" required></input></td>
                </tr>
                <tr>
                    <td><font size="6" >Sex:</font></td>
                    <td><input type="text" name="dsex" required></input></td>
                </tr>
                <tr>
                    <td><font size="6">Mobile:</font></td>
                    <td><input type="text" name="dmobile" required pattern="[0-9]{10}"/></td>
                </tr>
                <tr>
                    <td><font size="6">Blood Group:</font></td>
                    <td><select name="dbgrp">
                                <option>O+</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>AB+</option>
                                <option>O-</option>
                                <option>A-</option>
                                <option>B-</option>
                                <option>AB-</option>
                        </select></td>
                </tr>
                <tr>
                    <td><font size="6">City:</font></td>
                    <td><select name="dcity">
                                <option value="Coimbatore">Coimbatore</option>
                                <option value="Chennai">Chennai</option>
                                <option value="Tiruppur">Tiruppur</option>
                                <option value="Erode">Erode</option>
                                <option value="Salem">Salem</option>
                        </select></td>
                </tr>
                
               <tr>
                    <td></td>
                    <td><input type="submit" value="Submit" name="b1"/>
                </tr>

                <tr>
<td><br></td>
</tr>
<tr>
<td><br></td>
</tr>
</table>
</div>

</center>
</form>
<?php
include "connection.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
 $inId=$_POST["donor_id"];
 $inName=$_POST["dname"];
 $inAge=$_POST["dage"];
 $inSex=$_POST["dsex"];
 $inMob=$_POST["dmobile"];
 $inBg=$_POST["dbgrp"];
 $inCity=$_POST["dcity"];
 //$sql="insert into donor values('".$inId."','".$inName."','".$inAge."','".$inSex."','".$inMob."','".$inBg."','".$inCity."')";
 $sql="insert into donor (donor_id, dname, dage, dsex, dmobile, dbgrp, dcity) values('".$inId."','".$inName."','".$inAge."','".$inSex."','".$inMob."','".$inBg."','".$inCity."')";

if(mysqli_query($conn,$sql))
{
?>
	<script type="text/javascript">alert('Records saved');</script>
<?php
	echo "Record saved";
}
else
{
?>
	<script type="text/javascript">alert('Some error occured in saving records');</script>
<?php	
	echo"Error in inserting data: ".mysqli_error($conn);
}
mysqli_close($conn);
}
?>
</body>
</html>
