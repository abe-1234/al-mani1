<html>
<?php
include "db.php";
$query = "SELECT * FROM tblsublocality WHERE CityID='".$_POST['CityID']."'";

 
$result=$mysqli->query($query);

?>
 <option disabled selected>Select Location</option> 
<?php
	while ($rs=$result->fetch_assoc()) {

?>
			<option value="<?php echo $rs["SublocalityID"]; ?>"><?php echo $rs["Sublocality"]; ?></option>



<?php
	}
?>
</html> 
