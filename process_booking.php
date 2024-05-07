<?php
include 'Connections.php'; 


if (!isset($connection) || $connection === null) {
    die('Database connection is not established. Check your Connections.php file.');
} else {
    echo 'Connection is successfully established.'; 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($connection == null) {
    die('Database connection is not established.');
} else {
    echo 'Connection successful'; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $property_id = mysqli_real_escape_string($connection, $_POST['property_id']);
    $check_in = mysqli_real_escape_string($connection, $_POST['check_in_date']);
    $check_out = mysqli_real_escape_string($connection, $_POST['check_out_date']);

  
    $booking_id = uniqid('booking_');

    $query = "INSERT INTO Booking (booking_id, b_user_id, b_property_id, check_in, check_out) VALUES (?, ?, ?, ?, ?)";

  
    if ($stmt = mysqli_prepare($connection, $query)) {
        
        mysqli_stmt_bind_param($stmt, "sssss", $booking_id, $user_id, $property_id, $check_in, $check_out);

    
        if (mysqli_stmt_execute($stmt)) {
          
            header("Location: booking_confirmation.php?status=success&booking_id=$booking_id");
            exit();
        } else {
    
            header("Location: booking_confirmation.php?status=error&error=" . urlencode(mysqli_error($connection)));
            exit();
        }

  
        mysqli_stmt_close($stmt);
    } else {
        echo "ERROR: Could not prepare query: $query. " . mysqli_error($connection);
    }
}


mysqli_close($connection);
?>
