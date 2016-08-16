<?php

include("db.php");
$mail=mysqli_real_escape_string($mysqli,$_POST["mail"]);

$query = "SELECT * FROM tbltutor WHERE TEmail = '$mail' AND Tstatus = 'active'";
$result = mysqli_query($mysqli,$query);
$num = mysqli_num_rows($result);
		
if(!$num)
{
	echo "Correct mail";
}
else
{
	echo "Email already exist!!";
}

?>