<?php
include_once("db.php");
$School = mysqli_real_escape_string($mysqli,$_POST['school']);
$sid;
	$query="INSERT INTO tblschool (SchoolName) VALUES ('$School')";
	
	if (!mysqli_query($mysqli,$query))
	{
		echo("Error description: " . mysqli_error($mysqli));

	}
	else
	{
		
		$sid = mysqli_insert_id($mysqli);
		
	}
	


$num = count($_POST["name"]);
if($num >= 1)
{ 
	for($i=0; $i<$num; $i++)
	{
		if($_POST["name"][$i] != '')
		{
			$sql2 = "INSERT INTO tbldept (Dept_name,School_ID) VALUES ('".mysqli_real_escape_string($mysqli,$_POST["name"][$i])."','".$sid."')";
           mysqli_query($mysqli, $sql2);
		   
		}
	}
	echo 'New School has inserted and the page will be refreshed in a few seconds';
	
}
else
{
	echo "Enter Department";
}

							
?>