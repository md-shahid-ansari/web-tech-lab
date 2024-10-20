<?php
$servername = "localhost:3306";
$username = "root";
$password = "Sadaf2003@";
$dbname = "form_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_create_table = "CREATE TABLE IF NOT EXISTS personal_details (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10),
    dob DATE,
    phone VARCHAR(15),
    email VARCHAR(50),
    village VARCHAR(100),
    block VARCHAR(100),
    district VARCHAR(100),
    city VARCHAR(100),
    country VARCHAR(100),
    pin VARCHAR(10),
    highestDeegre VARCHAR(100),
    collage VARCHAR(100),
    12thBoard VARCHAR(100),
    12thMarks FLOAT
)";
$conn->query($sql_create_table);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $village = $_POST['village'];
    $block = $_POST['block'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $pin = $_POST['pin'];
    $highestDeegre = $_POST['highestDeegre'];
    $collage = $_POST['collage'];
    $board = $_POST['12thBoard'];
    $marks = $_POST['12thMarks'];

    $sql_insert = "INSERT INTO personal_details 
        (name, age, gender, dob, phone, email, village, block, district, city, country, pin, highestDeegre, collage, 12thBoard, 12thMarks) 
        VALUES ('$name', '$age', '$gender', '$dob', '$phone', '$email', '$village', '$block', '$district', '$city', '$country', '$pin', '$highestDeegre', '$collage', '$board', '$marks')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}


$sql_display = "SELECT * FROM personal_details";
$result = $conn->query($sql_display);

if ($result->num_rows > 0) {
    echo "<h2>Stored Data</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>DOB</th><th>Phone</th><th>Email</th><th>Village</th><th>Block</th><th>District</th><th>City</th><th>Country</th><th>Pin</th><th>Highest Degree</th><th>Collage</th><th>12th Board</th><th>12th Marks</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["email"]. "</td><td>" . $row["village"]. "</td><td>" . $row["block"]. "</td><td>" . $row["district"]. "</td><td>" . $row["city"]. "</td><td>" . $row["country"]. "</td><td>" . $row["pin"]. "</td><td>" . $row["highestDeegre"]. "</td><td>" . $row["collage"]. "</td><td>" . $row["12thBoard"]. "</td><td>" . $row["12thMarks"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
