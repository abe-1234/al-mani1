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
    
  

function getLocality(val)
  {
	  

   $.ajax({
    method:"POST",
    url: "getSubLocality.php", 
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
			<h3><span>Student and Lecturer Registration</span></h3>
			<div class="events-grids">
			<div class="row">
			 <div class="table-responsive">
               <table class="table table-hover">
			    <tbody>
					<tr>
					    <td>Select User type you want to register:</td>
						<td><label class="form-check-inline">
							  <input class="form-check-input" type="checkbox" id="chkStud" value="option1"> Student
							</label>
						 </td>
						 <td>
						  <label class="form-check-inline">
							<input class="form-check-input" type="checkbox" id="chkLect" value="option2"> Lecturer
						   </label>
						 </td>
						
					</tr>
				</body>
			   </table>
			  </div>
			    <div id="Lect">
				
                 <div class="panel panel-default">
				  <p style="text-align:center;">Lecturer Registration</p>
				  <!-- Default panel contents -->
				 
				  
				  <div class="panel-heading">Personal Data</div>
				  <div class="panel-body">
					 
					 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return false;" method="POST" id="lectfrm" >
						<div class="form-group row">
							  <label for="lfname" class="col-sm-2 col-form-label" >Firstname</label>
							  <div class="col-sm-10">
							    <input type="text" id="lfname" name="lfname"  placeholder="Firstname" class="form-control" >
							</div>
						</div>
					    <div class="form-group row">
						  <label for="llname" class="col-sm-2 col-form-label" >Lastname</label>
						  <div class="col-sm-10">
						   <input type="text"  placeholder="Lastname" onblur="getUMail();"  id="llname" name="llname" class="form-control">
							</div>
						</div>
                         					
						<div class="form-group row">
						  <label for="ldob" class="col-sm-2 col-form-label">Date of Birth</label>
						  <div class="col-sm-10">
						   <input type="date" onchange="myFunction();"  id="ldob" name="ldob" class="form-control">
						   </div>
						</div>
						<div class="form-group row">
						  <label for="lNIC" class="col-sm-2 col-form-label" >NIC</label>
						  <div class="col-sm-10">
						   <input type="text"  placeholder="NIC" id="lNIC" name="lNIC" class="form-control">
							</div>
						</div>
						<div class="form-group row">
						  <label for="ltel" class="col-sm-2 col-form-label">Telephone Number</label>
						  <div class="col-sm-10">
						    <input type="text" id="ltel" name="ltel" placeholder="Telephone number" class="form-control">
						   </div>
						</div>
						<div class="form-group row">
						<label for="lmob" class="col-sm-2 col-form-label">Mobile Number</label>
						  <div class="col-sm-10">
						   <input type="text" id="lmob" name="lmob" placeholder="Mobile number" class="form-control">
						  </div>
						</div>
						<div class="form-group row">
						  <label  class="col-sm-2 col-form-label">Marital Status</label>
						  <div class="col-sm-10">
						   <label class="form-check-inline">
							  <input class="form-check-input"  type="radio" id="chkmarried" value="Married" required name="status" >Married&nbsp;&nbsp;
							</label>
						   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label class="form-check-inline">
							<input class="form-check-input" type="radio" id="chksingle" value="Single" name="status" >Single
						   </label>
						  </div>
						  </div>
						<div class="form-group row">
						  <label  class="col-sm-2 col-form-label">Sex</label>
						  <div class="col-sm-10">
							<label class="form-check-inline">
							  <input class="form-check-input" type="radio" id="chkfemale" value="Female" required name="gender" >Female&nbsp;&nbsp;&nbsp;
							</label>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label class="form-check-inline">
							<input class="form-check-input" type="radio" id="chkmale" value="Male" name="gender" >Male
						   </label>
						   
						  </div>
						  
						</div>
						<div class="form-group row">
							  <label for="lcity" class="col-sm-2 col-form-label">Your City/Village:</label>
							  <div class="col-sm-10"> 
							    <select name="lcity" onchange="getLocality(this.value);" class="form-control" required id="lcity">
								 <option disabled selected>Select City/Village</option>
								 <?php
									$res=$mysqli->query("SELECT * FROM tblcity");
									while($row=$res->fetch_array())
									{
									 ?>
										<option value="<?php echo $row['CityID']; ?>"><?php echo $row['CityName']; ?></option>
										<?php
									}
									?>
								
								</select>
							  </div>
						</div>
						<div class="form-group row">
							  <label for="lsublocality" class="col-sm-2 col-form-label">Sublocality:</label>
							  <div class="col-sm-10"> 
							    <select name="lsublocality" class="form-control" required id="lsublocality">
								 <option disabled selected>Select Sublocality</option>
								
								</select>
							  </div>
						</div>
						<div class="form-group row">
						  <label for="lmail" class="col-sm-2 col-form-label">Email</label>
						  <div class="col-sm-10">
						   <input type="text" class="form-control" id="lmail" name="lmail" placeholder="Email" >
						  </div>
						</div>
						<div class="form-group row">
						  <label for="lpass" class="col-sm-2 col-form-label">Password</label>
						  <div class="col-sm-10">
						     <?php
							  function passFunc($len,$set="")
							  {
								  $gen="";
								  for($i=0;$i<$len;$i++)
								  {
									$set= str_shuffle($set);
                                    $gen .=$set[0];									
								  }
								  return $gen;
							  }
							  $lpass= passFunc(8,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'); 
							  
							?>
							<input type="password" readonly="true" value="<?php echo $lpass;?>" id="lpass" name="lpass" class="form-control">
						  </div>
						</div>
						
						
				  
				  <!-- Default panel contents -->
				  <div class="panel-heading">Detailed information</div>
				  
					
						<div class="form-group row">
						     <div id="getUMail" style="color:red;"></div>
							  <label for="lumail" class="col-sm-2 col-form-label">Umail Address</label>
							  <div class="col-sm-10">
							    
								<input type="text" readonly="true" class="form-control" placeholder="Umail Address"  name="lumail" id="lumail">
							  </div>
						</div>
						<div class="form-group row">
						  <label  class="col-sm-2 col-form-label">Mode</label>
						  <div class="col-sm-10">
							<label class="form-check-inline">
							  <input class="form-check-input" type="radio" id="chkpt" value="Part-Time" required name="mode">Part-Time&nbsp;&nbsp;&nbsp;
							</label>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label class="form-check-inline">
							<input class="form-check-input" type="radio" id="chkft" value="Full-Time" name="mode" >Full-Time
						   </label>
						   
						  </div>
						  
						</div>
						<div class="form-group row">
						 <label for="lschool" class="col-sm-2 col-form-label" >School Lecturer works</label>
							  <div class="col-sm-10"> 
							    <select name="lschool" class="form-control"  id="lschool" required >
								 <option disabled selected>Select school</option>
								 
								 <?php
									$res=$mysqli->query("SELECT * FROM tblschool");
									while($row=$res->fetch_array())
									{
									 ?>
										<option value="<?php echo $row['School_ID']; ?>"><?php echo $row['SchoolName']; ?></option>
										<?php
									}
									?>
								
								</select>
							  </div>
						</div>
						<div class="form-group row">
							  <label for="ldept" class="col-sm-2 col-form-label">Department</label>
							  <div class="col-sm-10"> 
							    <select name="ldept" class="form-control" required id="ldept">
								 <option disabled selected>Select Department</option>
								  <option>Head of School</option>
								  <option >Office in Charge</option>
								  <option>Adminitration</option>
								  <option>Examination Unit</option>
								  <option>Department of Environment Science and Social Sustainability</option>
								  <option>Department of Tourism Leisure and Services</option>
								  <option>Department of Accounting, Finance and Economic</option>
								  <option>Department of Business, Management and Law</option>
								  <option >Management Info System Unit</option>
								  <option >Technical Dept</option>
								  <option >Department of Business Informatics and Software Engineering</option>
								  <option >Department of Applied Mathematical Sciences</option>
								</select>
							  </div>
						</div>
						<div class="form-group row">
							  <label for="lposition" class="col-sm-2 col-form-label">Position</label>
							  <div class="col-sm-10"> 
							    <select name="lposition" class="form-control" required id="lposition">
								 <option disabled selected>Select Position</option>
								  <option >Head of School</option>
								  <option>Confidential Secretary</option>
								  <option>Ag. Assisstant Registrar</option>
								  <option >Ag. Administration Officer</option>
								  <option>Ag. System Analyst</option>
								  <option>Ag. System Engineer</option>
								  <option>Head of Department</option>
								  <option>Associate Professor</option>
								  <option>Senior Lecturer</option>
								  <option>Officer in Charge</option>
								  <option>Lecturer</option>
								</select>
							  </div>
						</div></br></br>
						<div class="btn-group" style="float:right;">
						<button type="submit"  id="submit" class="btn btn-info">Register</button>
						<button type="reset" class="btn btn-danger">Cancel</button>
						</div> 
				 
                  </form>		 
				  
				  </div>
				</div>
				
			  </div>

			
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
  
<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
	
		



		$(document).ready(function() {
							
			$().UItoTop({ easingType: 'easeOutQuart' });
			
				//validation
				
				$.validator.addMethod('regexp', function(value, element, param) {
        return this.optional(element) || value.match(param);
    });

				 
				$( "#lectfrm" ).validate( {
				rules: {
					lfname: {required:true,
					         regexp:"[A-Za-z]"
						
					        },
					llname: {required:true,
					         regexp:"[A-Za-z]"
						
					        },
					ldob: "required",
					lNIC:{required:true,
					       maxlength:14,
						   minlength:14
						
					      },
					ltel: {  
					        number:true,
							minlength:7,
							maxlength:8
						   
					      },
					lmob: { 
					        number:true,
							minlength:8,
							maxlength:8
					      },
					
					lmail: {
						required: true,
						email: true
					},
					lumail: {
						required: true,
						email: true
					}
				},
				messages: {
					lfname: {required:"Please enter your Firstname",
					         regexp:"Enter only alphabets"
						
					        },
					llname: {required:"Please enter your Lastname",
					         regexp:"Enter only alphabets"
						
					        },
					ldob: "Please Enter your Date of Birth",
					lNIC:{required:"Please enter your NIC",
					       maxlength:"Enter 14 characters",
						   minlength:"Enter 14 characters"
						
					      },
					ltel: { 
					        number:"Enter only numbers",
							minlength: "Your telephone must consist of at least 7 numbers",
							maxlength:"Your telephone must consist atmost 8 numbers"
							},
					lmob: { 
					        number:"Enter only numbers",
							minlength: "Your mobile must consist of at least 8 numbers",
							maxlength:"Your Mobile must consist atmost 8 numbers"
							},
					
					
					lmail: {
						required: "Please enter an email",
						email: "Enter a correct format!"
					},
					lumail: {
						required: "Please enter an email",
						email: "Enter a correct format!"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-10" ).addClass( "has-feedback" );

									if ( element.is(":radio") ) 
						{
							error.appendTo( element.parents('.col-sm-10') );
						}
						else
						{ // This is the default behavior 
							error.insertAfter( element );
						}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-10" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
			
			$("#lectfrm").submit(function() {
               if ($("#lectfrm").valid()) {
                    var data1 = $('#lectfrm').serialize();
                    $.ajax({
                        type: "POST",
                        url: "reg_Lect_DB.php",
                        data: data1,
                        success: function(msg) {
                            alert(msg);
                            
                        }
                    });
                }
				});	
            
});			

	</script>
<!-- //here ends scrolling icon -->
</body>

</html>