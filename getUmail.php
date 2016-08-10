<?php

include("db.php");
$fname=mysqli_real_escape_string($mysqli,$_POST["fname"]);
$lname=mysqli_real_escape_string($mysqli,$_POST["lname"]);

$umail = $fname.$lname."@umail.utm.ac.mu";
echo $umail;

?>