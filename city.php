<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php
    if(isset($_GET["city"])) {
        $city = htmlspecialchars($_GET["city"]);

    
        $servername = "localhost:3306";
        $username = "root";
        $password = "Georges116";
        $dbname = "NESTLY";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    
        $sql = "SELECT * FROM PROPERTY WHERE address LIKE '%$city%'";

    
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<p>Property ID: " . $row["property_id"]. "</p>";
                echo "<p>Address: " . $row["address"]. "</p>";
                echo "<p>Description: " . $row["description"]. "</p>";
                echo "<p>Price: $" . $row["pricing"]. "</p>";
                echo "<button onclick='bookNow(\"" . $row["property_id"] . "\")'>Book Now</button>";
                echo "<hr>"; 
                echo "</div>";
            }
        } else {
            echo "No results found.";
        }


        $conn->close();
    } else {
        echo "City parameter is not set.";
    }
    ?>

    <script>
        function bookNow(propertyId) {
            window.location.href = "booking.php";
        }
    </script>
</body>
</html>
