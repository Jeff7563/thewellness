<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('กรุณาเข้าสู่ระบบก่อนลงทะเบียน');
            window.location.href = './html/login.html';
        </script>";
    exit;
}

?>
<div class="course">
    <h3>คอร์ส: เพิ่มพลังสุขภาพ</h3>
    <p>วันที่: 29 ต.ค. 2567</p>
    <p>เวลา: 16:00 - 17:00 น.</p>
    <p>สถานที่: The Wellness GT</p>
    <form method="POST" action="register_course.php">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="hidden" name="course_id" value="1"> <!-- ตัวอย่าง course_id -->
        <input type="hidden" name="course_name" value="เพิ่มพลังสุขภาพ"> <!-- ตัวอย่าง course_name -->
        <button type="submit" class="btn btn-success">ลงทะเบียนเข้าร่วม</button>
    </form>
</div>