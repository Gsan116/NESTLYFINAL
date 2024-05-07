<?php
$servername = "localhost:3306";
$username = "root"; 
$password = "Georges116"; 
$dbname = "NESTLY";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT description, price, category, location, availability FROM LOCAL_EXPERIENCE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    echo "<h1>Local Experiences</h1>";
    echo "<div style='margin: auto; width: 80%; padding: 10px;'>";
    while($row = $result->fetch_assoc()) {
        echo "<div style='border: 1px solid #ddd; padding: 10px; margin-top: 10px;'>";
        echo "<h2>" . htmlspecialchars($row["category"]) . "</h2>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><strong>Location:</strong> " . htmlspecialchars($row["location"]) . "</p>";
        echo "<p><strong>Price:</strong> $" . htmlspecialchars($row["price"]) . "</p>";
        echo "<p><strong>Availability:</strong> " . ($row["availability"] == '1' ? 'Available' : 'Not Available') . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "0 results found";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Experiences</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>
<body>
</body>
</html>
