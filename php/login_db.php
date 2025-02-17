<?php
    session_start();
    include('./server.php');

    $errors = array();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT user_id, password FROM users WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();
    
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            echo "Login successful!";
            header('location: ./index.php');
        } else {
            echo "<script>
                    alert('Invalid username or password.');
                    window.location.href = '../html/login.html';
                </script>";
                
        }
        
        $stmt->close();
        $conn->close();
    }

?>
