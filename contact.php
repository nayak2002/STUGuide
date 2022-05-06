<?php
 $nm=$_POST["name"];
 $rn=$_POST["email"];
 $m1=$_POST["tel"];
 $m2=$_POST["sub"];
 $m3=$_POST["message"];
 

$conn = new mysqli("localhost","root","","dbms_pro");


$sql = "INSERT INTO contact 
VALUES ('$nm','$rn','$m1', '$m2','$m3')";

if ($conn->query($sql) === TRUE) {
    echo "<script>location.replace('contact.html');alert('New record created succesfully!');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>