<?php 
session_start();
$_SESSION['login'] == false;
session_destroy();

echo "<script>window.location.href = '../UTM/login.php'</script>";

?>