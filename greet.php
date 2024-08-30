<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet!</title>
    <link rel="stylesheet" type="text/css" href="greet.css">
</head>
<body>
    <?php
        $name = $_POST["name"];
        $n = $_POST["number"];
        $msg = $_POST["msg"];
        echo '<div class="output">';
        for ($i = 1; $i <= $n; $i++) {
            echo "<span>".$msg. ", " .$name. "</span><br>";
        }
        echo '</div>';
    ?>
</body>
</html>