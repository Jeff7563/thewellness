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
    
    $sql = "INSERT INTO users (id, email, username, fullname, gender, age, phone, password, activity, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssisss", $id, $email, $username, $fullname, $gender, $age, $phone, $password, $activity);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('สมัครสมาชิกแล้ว!');
                window.location.href = '../html/login.html';
            </script>";
    } else {
        echo "<script>
                alert('เกิดข้อผิดพลาดในการสมัครสมาชิก');
                window.location.href = '../html/login.html';
            </script>";
    }
    
    $stmt->close();
    $conn->close();
    

?>