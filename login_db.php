<?php
    session_start();
    include('server.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT password FROM users WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
    
        if (password_verify($password, $hashed_password)) {
            echo "Login successful!";
            header('location: ./index.php');
        } else {
            echo "Invalid username or password.";
        }
    
        $stmt->close();
        $conn->close();
    }

?>
