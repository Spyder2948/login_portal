<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "temp";
$conn = mysqli_connect($servername, $username, $password, $database);

if($conn)
{
    #echo "connected to database";
}
else
{
 die("Error".mysqli_connect_error());
}
?>