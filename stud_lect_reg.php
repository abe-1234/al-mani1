<?php
include_once("session_admin.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Portal</title>
<?php include("head.php");?>
  
  
  

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
		
		$("#ft").hide();
		$("#chkft").click(function(){
          $("#ft").show();
        });
		
		$("#chkpt").click(function(){
          $("#ft").hide();  
        });
		
		$("#SchDept").hide(); 
		$("#addsch").click(function(){
			$("#SchDept").show(); 
			 
		});
		
	   $("#cancel1").click(function(){
			$("#SchDept").hide(); 
			
			window.location.href="#lposition";
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
    url: "getSubLocation.php", 
    data: 'CityID='+val,
    success: function(data){
      $("#lsublocality").html(data);
     // $('#lsublocality').selectpicker('refresh');
    }
   });

  }
  
   function getUMail(){
	   
	   var mail = document.getElementById("lmail").value;
	   
		    $.ajax({
    method:"POST",
    url: "getUmail.php", 
    data: "mail="+mail,
    success: function(data){
		if(data == "Correct mail")
		{
			document.getElementById("err").innerHTML = "<p style='color:green'><small>Correct Email!!</small></p>";
		}
		else
		{
			document.getElementById("err").innerHTML = "<p style='color:red'><small>*Choose another Email</small></p>";
			
		}
     
    }
   });
	   
   
   
   }
   
   
   
  function getDept(val)
  {
	  

   $.ajax({
    method:"POST",
    url: "getDept.php", 
    data: 'School_ID='+val,
    success: function(data){
      $("#ldept").html(data);
     
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
				  <div align="center" class="panel-heading">Lecturer Registration</div>
				  <!-- Default panel contents -->
				 
				  
				  
				  <div class="panel-body">
					 
					 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return false;" method="POST" id="lectfrm" >
						<div class="form-group row">
						  <label  class="col-sm-2 col-form-label">Mode</label>
						  <div class="col-sm-10">
							<label class="form-check-inline">
							  <input class="form-check-input" type="radio" id="chkpt" checked value="Part-Time"  name="mode">Part-Time&nbsp;&nbsp;&nbsp;
							</label>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label class="form-check-inline">
							<input class="form-check-input" type="radio" id="chkft" value="Full-Time" name="mode" >Full-Time
						   </label>
						   
						  </div>
						  
						</div>
						<div id="ft">
						<div class="form-group row">
						 <label for="lschool" class="col-sm-2 col-form-label" >School Lecturer works</label>
						   <div class="form-group row">
							  <div class="col-sm-9"> 
								<select name="lschool" class="form-control" onchange="getDept(this.value);"  id="lschool" >
								 <option disabled selected >Select school</option>
								 
								 <?php
								 
									$res=$mysqli->query("SELECT * FROM tblschool WHERE SchoolName NOT IN ('Null')");
									while($row=$res->fetch_array())
									{  
									?>
									<option value="<?php echo $row['School_ID']; ?>"><?php echo $row['SchoolName']; ?></option>
									<?php
									}
									?>
								</select>
							  </div>
								<a href="#lpass"><button type="button" name="addsch" class="btn btn-success" id="addsch">+</button></a>
						  </div>	
						</div>
						
						
						<div class="form-group row">
							  <label for="ldept" class="col-sm-2 col-form-label">Department</label>
							  <div class="col-sm-10"> 
							    <select name="ldept" class="form-control"  id="ldept">
								 <option disabled  selected>Select Department</option>
								</select>
							  </div>
						</div>
						<div class="form-group row">
							  <label for="lposition" class="col-sm-2 col-form-label">Position</label>
							  <div class="col-sm-10"> 
							    <select name="lposition"  class=" form-control"  id="lposition">
								 <option disabled value="" selected>Select Position</option>
								  <option>Associate Professor</option>
								  <option>Senior Lecturer</option>
								  <option>Lecturer</option>
								</select>
							  </div>
						</div>
						</div>
						
						<div class="form-group row">
							  <label for="lfname" class="col-sm-2 col-form-label" >Firstname</label>
							  <div class="col-sm-10">
							    <input type="text" id="lfname" name="lfname"   placeholder="Firstname" class="form-control" >
							</div>
						</div>
					    <div class="form-group row">
						  <label for="llname" class="col-sm-2 col-form-label" >Lastname</label>
						  <div class="col-sm-10">
						   <input type="text"  placeholder="Lastname"   id="llname" name="llname" class="form-control">
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
							  <input class="form-check-input"  type="radio" id="chkmarried" value="Married" checked required name="status" >Married&nbsp;&nbsp;
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
							  <input class="form-check-input" type="radio" id="chkfemale" value="Female"  name="gender" >Female&nbsp;&nbsp;&nbsp;
							</label>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <label class="form-check-inline">
							<input class="form-check-input" type="radio" id="chkmale" value="Male" checked name="gender" >Male
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
						 <div id="err"></div>
						  <label for="lmail" class="col-sm-2 col-form-label">Email</label>
						  <div class="col-sm-10">
						   <input type="text" class="form-control" id="lmail" onchange="getUMail();" name="lmail" placeholder="Umail" >
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
						
						
						</br></br>
						<div class="btn-group" style="float:right;">
						<button type="submit"  id="submit" class="btn btn-info">Register</button>
						<button type="reset" class="btn btn-danger">Cancel</button>
						</div> 
				 
                  </form>		 
				  
				  </div>
				</div>
				
			  </div>

			<!-- NEW SCHOOL & DEPT -->
						<div id="SchDept" align="center">
						
						<div class="panel panel-default">
                      <div class="panel-heading">New School and Department</div>
					  <div class="panel-body">
						<form name="add_name" id="add_name">
						 <div class="table-responsive">
						   <table class="table table-hover" id="dynamic_field">
							<tr>
							<td><input type="text" required name="school" id="school" placeholder="Enter school" class="form-control"/></td>
							</tr>
								<tr>
								  <td><input type="text" name="name[]" required id="name" placeholder="Enter Department" class="form-control"/></td>
								  <td><button type="button" name="add" class="btn btn-success" id="add">+</button></td>
								</tr>
							
						   </table>
						   <input type="button" name="submit1" id="submit1" class="btn btn-info"  value="submit" />
						   <input type="button" name="cancel1" id="cancel1" class="btn btn-warning" value="Cancel" />
						  </div>
						 </form>
						</div>
						</div>
						</div>
						<!-- END OF NEW SCHOOL & DEPT -->
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
				
	
		$.validator.addMethod("lettersonly", function(value, element) {
		  return this.optional(element) || /^[A-Za-z]+$/i.test(value);
		}); 
		
		
				 
				$( "#lectfrm" ).validate( {
				rules: {
					lfname: {required:true,
					         lettersonly: true
						
					        },
					llname: {required:true,
					         lettersonly: true
						
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
					lschool:"required",
					ldept:"required",
					lposition:"required"
				},
				messages: {
					lfname: {required:"Please enter your Firstname",
					         lettersonly:"Enter only alphabets"
						
					        },
					llname: {required:"Please enter your Lastname",
					         lettersonly:"Enter only alphabets"
						
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
					lschool:"Select a School",
					ldept:"Select a department",
					lposition:"Select a position"
					
				},
				ignore:":hidden",
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
<script>
$(document).ready(function(){
	var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" required name="name[]" id="name" placeholder="Enter Department" class="form-control"/></td><td><button name="remove" class="btn btn-danger btn_remove" id="'+i+'">X</button></td></tr>');
		
	});
	$(document).on('click', '.btn_remove', function(){
		var btn_id = $(this).attr("id");
		$("#row"+btn_id+"").remove();
		
	});
	
	
		$(document).on('click', '#submit1', function(){
		$.ajax({
			url:"sch_dept.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				if(data == "New School has inserted and the page will be refreshed in a few seconds")
				{   

					location.reload();
					// $('#add_name')[0].reset();
					// $('#SchDept').hide();
					
				}
				else
				{
					$('#add_name')[0].reset();
				}
				
			}
			
		});
		
	});
	
	
});
</script>