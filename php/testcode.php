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

    // รับข้อมูลผู้ใช้และคอร์ส
    $userId = $_SESSION['user_id']; // ตัวอย่าง user_id ที่ลงทะเบียน
    $course_id = rand(1000, 9999); // สุ่ม course_id
    $course_name = "Yoga Basics"; // ชื่อคอร์สที่เลือก
    $register_date = date('Y-m-d H:i:s'); // เวลาลงทะเบียนปัจจุบัน
    $make_payment = 0; // ยังไม่ชำระเงิน

    // เพิ่มข้อมูลในตาราง courses หากยังไม่มีคอร์สนี้
    $checkCourse = $conn->prepare("SELECT course_id FROM courses WHERE course_id = ?");
    $checkCourse->bind_param("i", $course_id);
    $checkCourse->execute();
    $result = $checkCourse->get_result();

    if ($result->num_rows === 0) {
        // เพิ่มข้อมูลคอร์สใหม่
        $insertCourse = $conn->prepare("INSERT INTO courses (course_id, course_name, date_of_activity ,regis_date) VALUES (?, ?, ?, NOW())");
        $activity_date = date('Y-m-d', strtotime('+7 days')); // วันที่กิจกรรมในอนาคต (ตัวอย่าง: อีก 7 วัน)
        $insertCourse->bind_param("iss", $course_id, $course_name, $activity_date);
        $insertCourse->execute();
    }

    // เพิ่มข้อมูลในตาราง registration
    $insertRegis = $conn->prepare("INSERT INTO registration (user_id, course_id, course_name, register_date, make_payment) VALUES (?, ?, ?, NOW(), ?)");
    $insertRegis->bind_param("iisi", $user_id, $course_id, $course_name, $make_payment);

    if ($insertRegis->execute()) {
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

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
}

?>