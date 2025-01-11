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
          <img src="../images/อูคูเลเล่.jpg" alt="รูปกิจกรรม">
          <div class="card-content">
              <!-- ข้อมูลกิจกรรม -->
              <div class="info-row">
                  <i class="fa fa-calendar"></i>
                  <span>วันที่: 24 พ.ย. 2567</span>
              </div>
              <div class="info-row">
                  <i class="fa fa-clock"></i>
                  <span>เวลา: 10:00 - 12:00 น.</span>
              </div>
              <div class="info-row">
                  <i class="fa fa-dollar-sign"></i>
                  <span>ราคา: 299 บาท</span>
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
                  รายละเอียด: มาเรียนรู้การเล่นอูคูเลเล่เพื่อสร้างความสนุกและเพลิดเพลินในชีวิตประจำวันกันเถอะ! คลาสเรียนนี้ออกแบบมาเพื่อผู้สูงอายุที่สนใจเรียนรู้การเล่นเครื่องดนตรีอูคูเลเล่ ซึ่งเป็นเครื่องดนตรีขนาดเล็กที่เล่นง่าย และสามารถเล่นได้ทุกที่ทุกเวลา
              </div>
              <!-- ปุ่มลงทะเบียน -->
              <a href="#" class="register-button">ลงทะเบียนเข้าร่วม</a>
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