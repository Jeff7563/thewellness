<?php
session_start();
include('./server.php');

// ตรวจสอบว่ามีการส่งข้อมูล POST เข้ามา
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id']; // ดึง user_id จากฟอร์ม
    $course_id = $_POST['course_id']; // ดึง course_id จากฟอร์ม
    $course_name = $_POST['course_name']; // ดึง course_name จากฟอร์ม

    // ตรวจสอบว่าผู้ใช้มีอยู่ในระบบ
    $sql_user_check = "SELECT id FROM users WHERE id = ?";
    $stmt_user_check = $conn->prepare($sql_user_check);
    $stmt_user_check->bind_param("i", $user_id);
    $stmt_user_check->execute();
    $result_user = $stmt_user_check->get_result();

    if ($result_user->num_rows == 0) {
        echo "<script>
                alert('User ID ไม่ถูกต้องหรือไม่มีในระบบ');
                window.location.href = './index.php';
            </script>";
        exit;
    }

    // เพิ่มข้อมูลลงตาราง member
    $sql = "INSERT INTO member (user_id, course_id, course_name, register_date) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $course_id, $course_name);

    if ($stmt->execute()) {
        echo "<script>
                alert('ลงทะเบียนสำเร็จ');
                window.location.href = './index.php';
            </script>";
    } else {
        echo "<script>
                alert('เกิดข้อผิดพลาดในการลงทะเบียน');
                window.location.href = './index.php';
            </script>";
    }

    $stmt->close();
    $conn->close();
}
