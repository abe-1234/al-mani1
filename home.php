<?php
include("db.php");


?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Portal</title>
<?php include("head.php");?>
  <script>
 
   function getUMail(){
	   var fname= document.getElementById("lfname").value;
	   var lname= document.getElementById("llname").value;
	   var err=document.getElementById("getUMail");
	   var txtbxmail = document.getElementById("lumail");
	   if(fname == ""){
		   err.innerHTML="*Firstname has not been entered!!";
		   
	   }else if(lname == ""){
		   err.innerHTML="*Lastname has not been entered!!";
	   }
	   else{
		   err.innerHTML = "";
		   
	    $.ajax({
    method:"POST",
    url: "getUmail.php", 
    data: "fname="+fname+"&lname="+lname,
    success: function(data){
		
      document.getElementById("lumail").value=data;
     // $('#lsublocality').selectpicker('refresh');
    }
   });
   
   }
   
   }
  </script>
  
  

<script type="text/javascript">


	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
		$("#Lect").hide();
		$("#chkLect").click(function(){
          $("#Lect").toggle();
        });
		
		
	});
	
	function myFunction() {
    var x = document.getElementById("ldob").value;
    var y=x.substr(0,10);
	var yr= y.substr(2,2);
	var mnth= y.substr(5,2);
	var dy= y.substr(8,2);
	var dymnth= dy.concat(mnth);
	var dymnthyr= dymnth.concat(yr);
	
	var nme = document.getElementById("llname").value;
    var lnme=nme.substr(0,1);
	
	var nic = lnme.concat(dymnthyr);
	document.getElementById("lNIC").value=nic;
	
	
}
    
  

function getLocation(val)
  {
	  

   $.ajax({
    method:"POST",
    url: "getSubLocation.php", 
    data: 'CityID='+val,
    success: function(data){
      $("#lsublocality").html(data);
     // $('#lsublocality').selectpicker('refresh');
    }
   });

  }
  
  
  
</script>
<!-- start-smoth-scrolling -->

</head>
	
<body>


<!-- header -->
	<?php include("menu.php");?>
	</br></br>
<!-- //header -->

<!-- events -->
	<div class="events">
		<div class="container">
			<h3><span>HOMEPAGE</span></h3>
			<div class="events-grids">
			<div class="row">
			 

			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
 </div>
<!-- //events -->
<!-- footer -->
	<?php include("footer.php");?>

<!-- //footer -->
<!-- Main JS  -->

<!-- //here ends scrolling icon -->
</body>

</html>