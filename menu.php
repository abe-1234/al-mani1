<?php 
						session_start();
						if(isset($_SESSION['login']) == false)
						{
						   
							echo"<script>window.location.href = '../UTM/login.php';</script>";
                        }
                        else
						{
							$id = $_SESSION['id'];
							include("db.php");
							$query = "SELECT * FROM tbladmin WHERE A_ID = '$id'";
							$result = mysqli_query($mysqli,$query);
							$db_field = mysqli_fetch_assoc($result);
							
							
		                }					
						?>

<div style="background-color:#AED6F1" class="header navbar navbar-default navbar-fixed-top">	
		<div class="header-top">
			<div class="container"> 
				<div class="header-top-left">
					<ul>
						<li><span aria-hidden="true"></span>Welcome to your Admin Panel
						  <?php echo $db_field['AFName'];	?>
						</li>
						
					</ul>
				</div>
				<div class="header-top-left1">
					<ul class="social-icons">
					   
					   <li><a data-toggle="tooltip" data-placement="top" title="Profile" class="soc_tooltip"  href="#"><i class="fa fa-user"></i></a></li>                  
					   <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="https://www.facebook.com/groups/454959504556630/#_=_"><i class="fa fa-facebook"></i></a></li>
						<li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="https://accounts.google.com/ServiceLogin?passive=1209600&osid=1&continue=https://plus.google.com/collections/featured&followup=https://plus.google.com/collections/featured#identifier"><i class="fa fa-google-plus"></i></a></li>
                        <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="https://www.linkedin.com/uas/login"><i class="fa fa-linkedin"></i></a></li>
						
				  </ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-bottom">
			<div class="container">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
						<div class="logo">
							<a class="navbar-brand" href="index.html"><img src="images/UTM.png" alt="logo"></a>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li><a href="home.php">Home</a></li>
								<li><a href="stud_lect_reg.php">Registrations</a></li>
								<li><a href="payment.php">Payment</a></li>
								<li><a href="timetable.php">Timetable</a></li>
								<li><a href="result.php">Result</a></li>
								
								<li><a href="NE.php" >News & Event</a></li>
						
								<li><a href="forums.php">Forums</a></li>
								<li><a data-toggle="tooltip" data-placement="top" title="Log-out"  href="logout.php"><i class="fa fa-sign-out"></i></a></li>
								
							</ul>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</div>