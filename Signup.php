<?php
 	$user=$_POST["username"];
 	$age=$_POST["age"];
 	$email=$_POST["email"];
 	$phone=$_POST["phone"];
 	$upassword=$_POST["upassword"];
	$reupassword=$_POST["reupassword"];
 

	$conn = new mysqli("localhost","root","","dbms_pro");

	if($upassword == $reupassword)
	{
		$sql = "INSERT INTO login_info
				VALUES ('$user','$age','$email', '$phone','$upassword')";

		if ($conn->query($sql) === TRUE) 
		{
			echo "<script>location.replace('contact.html');alert('Signed Up Successfully');</script>";
			header('Location:Login_Signin_Page.html');
		} 
		else 
		{
    			echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
	else
	{
		echo "Password is not matching, Enter again!!";
	}	
	$conn->close();

 ?>