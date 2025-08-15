<?php
// Database connection
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "contact_db";     

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $conn->real_escape_string($_POST['firstname']);
    $lname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $state = $conn->real_escape_string($_POST['state']);
    $message = $conn->real_escape_string($_POST['subject']);

    $sql = "INSERT INTO contacts (firstname, lastname, email, state, message)
            VALUES ('$fname', '$lname', '$email', '$state', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
