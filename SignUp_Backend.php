<!DOCTYPE html>

<html>
    <head>
        <title>SignUp Database</title>
        <style>
            table
            {
                border-collapse: collapse;
                width: 100%;
                color: #588c7e;
                font-family: monospace;
                font-size: 25px;
                text-align: center;
            }
            th 
            {
                background-color: #588c7e;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
        </style>
    </head>
    <body>
        <?php
            $conn = new mysqli("localhost","root","","dbms_pro");
            /*if($conn -> connect_error())
            {
                die("Not able to connect!".$conn -> connect_error());
            }*/
            $sql = "SELECT username,age,email,phone,upassword from login_info";
            $result = $conn -> query($sql);

            if($result-> num_rows > 0)
            {
                echo "<table>";
                echo "<tr><th> User Name</th> <th>Age </th> <th> Email ID </th> <th> Phone</th> <th> Password</th></tr> <br>";
                while($row = $result-> fetch_assoc())
                {
                    
                    echo "<tr><td>". $row["username"] ."</td><td>" .$row["age"]  ."</td><td>" .$row["email"]  ."</td><td>" .$row["phone"] . "</td><td>" .$row["upassword"] ."</td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "No result!";
            }
            $conn-> close();
        ?>
        
    </body>
</html>