<?php 
    session_start();
    include('server.php');
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $activity = $_POST['activity'];
    
    $sql = "INSERT INTO users VALUES ('','$email', '$username', '$fullname', '$gender', '$age', '$phone', '$password', '$activity', 'Active', 'User', '')";
    $callback_sql = mysqli_query($conn , $sql);
    
    if ($callback_sql) {
        echo "Registration successful!";
        header('location: ../html/login.html');
    } else {
        echo "Error: " . $callback_sql->error;
    }
    
    $stmt->close();
    $conn->close();
    

?>