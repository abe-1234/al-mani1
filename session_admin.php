<?php 
session_start();
include("db.php");
						
						if(isset($_SESSION['login']) == false)
						{
						   
							echo"<script>window.location.href = '../UTM/login.php';</script>";
                        }
                        else
						{
							$id = $_SESSION['id'];
							
							$query = "SELECT * FROM tbladmin WHERE A_ID = '$id'";
							$result = mysqli_query($mysqli,$query);
							$db_field = mysqli_fetch_assoc($result);
							
							
		                }					
						?>