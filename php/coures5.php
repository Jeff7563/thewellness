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

// Assuming you want to get the username of a specific user, e.g., with id 1
$userId = 1;
$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The wellness</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/stylecoures.css">
</head>
<body>
<header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="Logo">wellness<span>.</span></a>
    <nav class="navbar">
        <a href="./Index.php#home">Home</a>
        <a href="./Index.php#about">about</a>
        <a href="./Index.php#course">course</a>
        <a href="./Index.php#concet">contact</a>
    </nav>
    <div class="navbar">
            <div class="nav-right">
                <!-- Profile Dropdown -->
                <div class="profile-dropdown">
                    <div class="fa-regular fa-user"></div>
                    <div class="profile-dropdown-content">
                        <div class="role">
                        <a href="#" class="active">User : <?php echo htmlspecialchars($username); ?></a>
                        </div>
                        <a href="./profile.php">Edit Profile</a>
                        <a href="../html/login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
</header>
<!-- header section end -->


<!-- cost section end  -->
<body>

  <div class="card-container">
      <!-- การ์ดกิจกรรม -->
      <div class="card">
          <img src="../images/ช้อปปิ้ง.jpg" alt="รูปกิจกรรม">
          <div class="card-content">
              <!-- ข้อมูลกิจกรรม -->
              <div class="info-row">
                  <i class="fa fa-calendar"></i>
                  <span>วันที่: 30 ต.ค. 2567</span>
              </div>
              <div class="info-row">
                  <i class="fa fa-clock"></i>
                  <span>เวลา: 10:30 - 12:00 น.</span>
              </div>
              <div class="info-row">
                  <i class="fa fa-dollar-sign"></i>
                  <span>ราคา: ไม่มีค่าใช้จ่าย</span>
              </div>
              <div class="info-row">
                  <i class="fa fa-user"></i>
                  <span>จำนวนที่รับ: 20 คน</span>
              </div>
              <div class="info-row">
                  <i class="fa fa-map-marker-alt"></i>
                  <span>สถานที่:The wellness GT</span>
              </div>

              <!-- เส้นแบ่ง -->
              <div class="divider"></div>

            
              <!-- ข้อมูลรายละเอียดกิจกรรม -->
              <div class="activity-details">
                  <i class="fa fa-info-circle"></i>
                  รายละเอียด: เปลี่ยนการช็อปปิ้งให้สะดวกสบายยิ่งขึ้น! กิจกรรมนี้ออกแบบมาเพื่อผู้สูงอายุที่ต้องการเรียนรู้วิธีการซื้อสินค้าออนไลน์ผ่านแอป Shopee โดยไม่ต้องกังวลเรื่องความยุ่งยาก
              </div>
              <!-- ปุ่มลงทะเบียน -->
              <form method="POST" action="./register_course.php">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="course_id" value="1"> <!-- ตัวอย่าง course_id -->
                <input type="hidden" name="course_name" value="เพิ่มพลังสุขภาพ"> <!-- ตัวอย่าง course_name -->
                <button type="submit" class="register-button">ลงทะเบียนเข้าร่วม</button>
            </form>
          </div>
      </div>
  </div>

  <!-- Font Awesome สำหรับไอคอน -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
<!-- cost section end  -->


<!-- footer section strats  -->
 <section class="footer" >
<div class="box-container11">

  <div class="box">
    <h3>quick links</h3>
      <a href="Index.html#home" id="home">Home</a>
      <a href="Index.html#about" id="about">about</a>
      <a href="Index.html#course" id="course">course</a>
      <a href="Index.html#concet" id="concet">contact</a>
    </div>

  <div class="box">
    <h3>contact info</h3>
    <a href="#">+123-456-7890</a>
    <a href="#">exzmple@gmail.com</a>
    <a href="#">Sakon Nakhon</a>
    <img src="images/pay.png" alt="" width="50%" >
    <div class="footer-bottom">
      <p>&copy; 2025 บริษัทThe wellness Golden Time. สงวนลิขสิทธิ์.</p>
  </div>
  </div>
</div>


 </section>