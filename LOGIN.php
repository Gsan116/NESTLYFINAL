<?php
session_start(); 

$servername = "localhost:3306";
$username = "root"; 
$password = "Georges116"; 
$dbname = "NESTLY";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $userpass = $_POST['password'];

    $sql = "SELECT * FROM USER WHERE user_id='$userid' AND password='$userpass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['userid'] = $userid; 
        header("Location: samples.php"); 
        exit();
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $userid = $_POST['newuserid'];
    $password = $_POST['newpassword'];
    $email = $_POST['email'];
    $accessibility = $_POST['accessibility'];
    $name = $_POST['name'];
    $preferences = $_POST['preferences'];


    $sql = "INSERT INTO USER (user_id, password, email, accessibility, name, preferences) VALUES ('$userid', '$password', '$email', '$accessibility', '$name', '$preferences')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['userid'] = $userid; 
        header("Location: samples.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SignUp - Nestly</title>
</head>
<body>
<h2>Login</h2>
<form action="LOGIN.php" method="post">
    <label for="userid">User ID:</label>
    <input type="text" name="userid" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="login">Login</button>
</form>

<?php if (isset($error)) echo "<p>$error</p>"; ?>

<h2>Sign Up</h2>
<form action="LOGIN.php" method="post">
    <label for="newuserid">New User ID:</label>
    <input type="text" name="newuserid" required>
    <label for="newpassword">New Password:</label>
    <input type="password" name="newpassword" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="accessibility">Accessibility:</label>
    <input type="text" name="accessibility">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="preferences">Preferences:</label>
    <input type="text" name="preferences">
    <button type="submit" name="register">Register</button>
</form>

</body>
</html>
