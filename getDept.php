<html>
<?php
include "db.php";
$query = "SELECT * FROM tbldept WHERE School_ID='".$_POST['School_ID']."'";

 
$result=$mysqli->query($query);

?>
 <option disabled  selected>Select Department</option> 
<?php
	while ($rs=$result->fetch_assoc()) {

?>
			<option value="<?php echo $rs["Dept_ID"]; ?>"><?php echo $rs["Dept_name"]; ?></option>



<?php
	}
?>
</html> 
