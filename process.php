<?php
        $username=$_POST['user'];
        $password=$_POST['pass'];
        // $username= mysql_real_escape_string(stripcslashes($username));
        // $password= mysql_real_escape_string(stripcslashes($password));

        $conn = mysqli_connect("localhost", "root", "", "unisys");
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql="select * from users where id='$username' and pass= '$password'";
        $result= $conn->query($sql);
        
        $row= $result->fetch_assoc();
        if($row['id']== $username && $row['pass'] == $password){
        echo "Successful login!";
            echo '<script type="text/javascript">
            window.location="authority.html"
            </script>';
        }
        else{
            echo "Failed to login!";
        }

?>