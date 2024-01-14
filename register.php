<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password


$sql = "INSERT INTO users (first_name, last_name, email, gender, phone, address, password) 
        VALUES ('$first_name', '$last_name', '$email', '$gender', '$phone', '$address','$password')";
if ($conn->query($sql) === TRUE) {
    header("Location: display_users.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>