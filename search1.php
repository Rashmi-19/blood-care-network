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
                background-color:white;
                background-size:cover;
                height:70vh;
                width:100vw;
                
        }
        .space{
          height:500px;
          width:800px;
          padding:10px;
          margin:10px;
        }
        .spcae1{
          height:400px;
          margin:10px;
        }

</style>
<center>
<div class="space ">

<div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Af0gk_kiGac?rel=0" allowfullscreen></iframe>
</div>
</div>
<div class="back">
<form name="Search" method="post" action="">
<table>

 <tr>
    <td><font size="6">City:</font></td>
    <td>
      <select name="dcity">
        <option value="Coimbatore">Coimbatore</option>
        <option value="Chennai">Chennai</option>
        <option value="Tripur">Tiruppur</option>
        <option value="Erode">Erode</option>
        <option value="Salem">Salem</option>
      </select>
    </td>
 </tr>
				
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
if (isset($_POST["dcity"]) && isset($_POST["dbgrp"])) {
    $inCity = $_POST["dcity"];
    $inBloodgroup = $_POST["dbgrp"];

    $sql = "SELECT * FROM donor WHERE (dcity='".$inCity."' AND dbgrp='".$inBloodgroup."')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<center><table class='results-table' border='1px' cellspacing='0' cellpadding='5'><tr><th>Name </th>";
      
        echo "<th>Mobile </th>";
        echo "<th>City </th>";
        echo "<th>Blood Group </th>";
    
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["dname"]."</td><td>".$row["dmobile"]."</td><td>".$row["dcity"]."</td><td>".$row["dbgrp"]."</td></tr>";
        }
    
        echo "</table></center>";
    } else {
        echo "<script type='text/javascript'>alert('No data found !!!');</script>";
        echo "<div style='text-align: center;'>NO RESULTS!</div>";
        //echo "NO RESULTS!";
    }
}

mysqli_close($conn);
?>

</body>
</html>
