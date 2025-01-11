<?php
    session_start();
    include('./server.php');

    $errors = array();
    
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
            $_SESSION['user_id'] = $user['id'];
            echo "Login successful!";
            header('location: ./index.php');
        } else {
            echo "<SCript>
                    alert('Invalid username or password.');
                    window.location.href = '../html/login.html';
                </SCript>";
        }

        $stmt->close();
        $conn->close();
    }

?>
