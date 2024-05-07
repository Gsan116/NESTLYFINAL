<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            margin-top: 15px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Your Stay</h1>
        <form action="process_booking.php" method="POST">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="property_id">Property ID:</label>
            <input type="text" id="property_id" name="property_id" required>

            <label for="check_in_date">Check-in Date:</label>
            <input type="date" id="check_in_date" name="check_in_date" required>

            <label for="check_out_date">Check-out Date:</label>
            <input type="date" id="check_out_date" name="check_out_date" required>

            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>
