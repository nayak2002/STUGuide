<?php
 	$user=$_POST["email"];
 	$repassword=$_POST["ps"];
 

	$conn = new mysqli("localhost","root","","dbms_pro");
    session_start();


	$sql = "SELECT username,upassword from login_info where username = '$user'";
    $resultant = $conn ->query($sql);
    if ($resultant->num_rows > 0)
    {
        while($row = $resultant->fetch_assoc())
        {
            if($repassword==$row["upassword"])
            {
                echo "Valid User/Password !";
                $_SESSION['user_id'] = $row['username'];
                header('Location:userprofile.php');
            }
            else
            {
                echo "Invalid User/Password !";
            }
        }
    }
	$conn->close();

 ?>