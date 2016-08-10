<?php
include("db.php");

//prevent sql injection
$FName=mysqli_real_escape_string($mysqli,$_POST["lfname"]);
$LName=mysqli_real_escape_string($mysqli,$_POST["llname"]);
$DOB=mysqli_real_escape_string($mysqli,$_POST["ldob"]);
$NIC=mysqli_real_escape_string($mysqli,$_POST["lNIC"]);
$tel=mysqli_real_escape_string($mysqli,$_POST["ltel"]);	
$mob=mysqli_real_escape_string($mysqli,$_POST["lmob"]);
$marital=($_POST["status"]);
$gender=($_POST["gender"]);
$address=($_POST["lsublocality"]);
$email=mysqli_real_escape_string($mysqli,$_POST["lmail"]);
$pw=mysqli_real_escape_string($mysqli,$_POST["lpass"]);
$umail=mysqli_real_escape_string($mysqli,$_POST["lumail"]);
$mode=($_POST["mode"]);
$School=($_POST["lschool"]);
$dept=($_POST["ldept"]);
$postn=($_POST["lposition"]);



$salt="ikrngngrngikrwngik925820496802986002+325i925fkjskjng";
$passwrd=$pw.$salt;
$hashed_pw=hash("sha512",$passwrd,true);
$pwencr= password_hash($hashed_pw,PASSWORD_DEFAULT,['salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM)]);
 


	//check if user exist already
	$query="select * from tbltutor where TEmail='$email' and TUmail='$umail' and TNIC='$NIC'";
	$result=mysqli_query($mysqli,$query) or die('error');
	if (mysqli_num_rows($result))
	{
	     echo('Email Already registered!!');
	}
else{
  
    $query="INSERT into tbltutor (TFName,TLName,TEmail,School_ID,SublocalityID,DOB,Tmode,TUmail,TPhone,TMobile,TPassword,Tstatus,TMarital_Sta,TSex,Tdept,Tpositn,TDate_reg,TNIC) values ('$FName','$LName','$email','$School','$address','$DOB','$mode','$umail','$tel','$mob','$pwencr','active','$marital','$gender','$dept','$postn',now(),'$NIC')";
	
	if (!mysqli_query($mysqli,$query))
	{
		echo("Error description: " . mysqli_error($mysqli));

	}
	else
	{
		
		require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "Sakeenah2492650@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "sakeenah123";
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'ssl';
		//Set who the message is to be sent from
		$mail->setFrom('Sakeenah2492650@gmail','University Technology of Mauritius');
		//Set an alternative reply-to address
		$mail->addReplyTo('Sakeenah2492650@gmail', 'University Technology of Mauritius');
		//Set who the message is to be sent to
		$mail->addAddress($email, $FName);
		//Set the subject line
		$mail->Subject = 'Registration to UTM Website';
		$mail->isHTML(true);
		$mail->Body ='<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
		  <h1>You have been registered to the UTM Website.</h1>
		  <div align="center">
			<a href="localhost:8080/UTM/index.php"><img src="UTM.png" height="90" width="340" ></a>
		  </div>
		  <p>Your Umail:'.$umail.'</p>
		  <p>Your Username:'.$email.'</p>
		  <p>Your password:'.$pw.'</p>
		  <p>You are advise to change your password for security reason</p>
		  <p><a href="localhost:8080/UTM/login.php"><u>Click here to login</u></a></p>
		</div>';
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		// redirect to success page
			if ($mail->send())
			{
				 echo "Registered!!";
			}
			else{
				 echo "Mailer Error: " . $mail->ErrorInfo;
					   
				}
     
    
  
    }
}
?>