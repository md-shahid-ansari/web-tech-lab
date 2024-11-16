<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel='stylesheet' type='text/css' href='form.css'>
</head>

<body>
    <h1>Enter Details</h1>
    <form action="http://localhost:3000/search.php" method="POST">
        <div>
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
    
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Sadaf2003@";
    $dbname = "form_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];

        // Use prepared statement to prevent SQL injection
        $sql_display = "SELECT * FROM personal_details WHERE name = ?";
        $stmt = $conn->prepare($sql_display);
        $stmt->bind_param("s", $name); // 's' for string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Matched Data</h2>";
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>DOB</th><th>Phone</th><th>Email</th><th>Village</th><th>Block</th><th>District</th><th>City</th><th>Country</th><th>Pin</th><th>Highest Degree</th><th>Collage</th><th>12th Board</th><th>12th Marks</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["dob"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["email"]. "</td><td>" . $row["village"]. "</td><td>" . $row["block"]. "</td><td>" . $row["district"]. "</td><td>" . $row["city"]. "</td><td>" . $row["country"]. "</td><td>" . $row["pin"]. "</td><td>" . $row["highestDeegre"]. "</td><td>" . $row["collage"]. "</td><td>" . $row["12thBoard"]. "</td><td>" . $row["12thMarks"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>