<!DOCTYPE html>
<html>
<body bgcolor="white">
<title>Sun's Blood Donation</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="topnav">
 
 <a class="active" href="Home.php">Home</a>
 <a class="active" href="reg.php">Register</a>
 <a class="active" href="search1.php">Search</a>
 <a class="active" href="donor.php" >Details</a>
 <a class="active" href="logout.php" style="float:right;">Log Out</a>
 <a class="active" href="contact.php" style="float:right;">Contact</a>
</div>
<style>
        .back{
                background-image:url("image/form_bg.png");
                background-color:white;
                background-size:cover;
                height:80vh;
                width:80vw;
                
        }
        .space{
          height:200px;
          width:300px;
          margin:10px;
        }
        

</style>
<center>
  
<div class="back">
<div class="space">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/images.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/images1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://media.istockphoto.com/id/1256078529/vector/volunteers-woman-and-man-donating-blood-blood-donor-charity-world-blood-donor-day-health.jpg?s=612x612&w=0&k=20&c=_3pwcvmuO7vi3S-Yi6_6yuUx6e0SBvNxjLQ9dCrw1Mw=" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<form name="Search" method="post" action="">
<table>

 
				
 <tr>
    <td><font size="6">Blood Group:</font></td>
    <td>
      <select name="dbgrp">
        <option value="O+">O+</option>
        <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="AB+">AB+</option>
        <option value="O-">O-</option>
        <option value="A-">A-</option>
        <option value="B-">B-</option>
        <option value="AB-">AB-</option>
      </select>
    </td>
 </tr>
 <tr>
    <td></td>
    <td><input type="submit" value="Search" name="b2"/></td>
 </tr>

</table>
</form>
</div>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pooper.js/1.16.0/umd/poper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include "connection.php";
?>

<html>
<head>
    <style>
        .results-table {
            background-color: lightcyan;
            background-size: cover;
        }
    </style>
</head>
<body style="background-color:white;">

<?php

if (isset($_POST["dbgrp"])) {
  
  $inBloodgroup = $_POST["dbgrp"];

$sql = "SELECT r.recp_name, d.dname, d.dbgrp, r.recp_bgrp, r.recp_bqty
FROM recipient r
JOIN donor d ON d.recstaff_id = r.rstaff_id
WHERE d.dbgrp='".$inBloodgroup."' AND r.recp_bgrp='".$inBloodgroup."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<center><table class='results-table' border='1px' cellspacing='0' cellpadding='5'><tr><th>Recipient Name </th>";

echo "<th>Donor Name </th>";
echo "<th>Donor Blood Group </th>";
echo "<th>Recipient Blood Group </th>";
echo "<th>Recipient Blood Quantity </th>";

while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["recp_name"]."</td><td>".$row["dname"]."</td><td>".$row["dbgrp"]."</td><td>".$row["recp_bgrp"]."</td><td>".$row["recp_bqty"]."</td></tr>";
}

echo "</table></center>";
}
else {
echo "<script type='text/javascript'>alert('No data found !!!');</script>";
echo "<div style='text-align: center; margin-bottom: 50px;'>NO RESULTS!</div>";
//echo "NO RESULTS!";
}
}

mysqli_close($conn);
?>

</body>
</html>

