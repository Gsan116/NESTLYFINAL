<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Booking Confirmation</h1>
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo "<p>Your booking was successful! Your Booking ID is: " . htmlspecialchars($_GET['booking_id']) . "</p>";
        } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
            echo "<p>Failed to make a booking. Error: " . htmlspecialchars(urldecode($_GET['error'])) . "</p>";
        }
        ?>
    </div>
</body>
</html>
