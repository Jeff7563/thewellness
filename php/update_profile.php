<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thewellness";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $activity = $_POST['activity'];
    $password = $_POST['password'];

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET username = ?, email = ?, fullname = ?, gender = ?, age = ?, phone = ?, activity = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisssi", $username, $email, $fullname, $gender, $age, $phone, $activity, $hashed_password, $userId);
    } else {
        $sql = "UPDATE users SET username = ?, email = ?, fullname = ?, gender = ?, age = ?, phone = ?, activity = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssissi", $username, $email, $fullname, $gender, $age, $phone, $activity, $userId);
    }

    if ($stmt->execute()) {
        header('location: ./profile.php');
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
