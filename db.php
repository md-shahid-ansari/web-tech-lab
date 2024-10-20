<?php
$servername = "localhost:3306";
$username = "root";
$password = "Sadaf2003@";
$dbname = "form_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    echo "Connected to database";
} else {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_close($conn);
?>
