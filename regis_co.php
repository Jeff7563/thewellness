<?php
// เริ่มต้น session เพื่อใช้ค่าจากการล็อกอิน
session_start();

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "thewellness");

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือยัง (user_id จาก session)
if (!isset($_SESSION['user_id'])) {
    die("กรุณาเข้าสู่ระบบก่อนลงทะเบียน");
}

// รับค่าจากแบบฟอร์มเมื่อผู้ใช้กดปุ่มลงทะเบียน
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course_id'])) {
    $user_id = $_SESSION['user_id']; // user_id จาก session
    $course_id = intval($_POST['course_id']); // ดึง course_id จากฟอร์ม

    // ตรวจสอบว่าผู้ใช้งานลงทะเบียนซ้ำหรือไม่
    $check_sql = "SELECT * FROM member WHERE user_id = ? AND course_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('คุณได้ลงทะเบียนคอร์สนี้แล้ว');</script>";
    } else {
        // เพิ่มข้อมูลลงในตาราง member
        $sql = "INSERT INTO member (user_id, course_id, register_date) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $course_id);

        if ($stmt->execute()) {
            echo "<script>alert('ลงทะเบียนสำเร็จ');</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาด: " . $stmt->error . "');</script>";
        }
    }
}
?>

<!-- HTML แบบฟอร์ม -->
<form method="POST" action="register_course.php">
    <!-- Hidden Input หรือปุ่มที่ส่งค่า course_id -->
    <input type="hidden" name="course_id" value="1"> <!-- เปลี่ยน 1 เป็นค่า course_id ที่เหมาะสม -->
    <button type="submit">ลงทะเบียน</button>
</form>
