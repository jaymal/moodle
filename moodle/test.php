<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moodle";

//Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if (!$conn) {

    die("Connection failed:" . mysqli_connect_error());
}
$sql = "SELECT count(id) FROM building";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['count(id)'];

mysqli_close($conn);
?>