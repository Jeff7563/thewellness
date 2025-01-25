<?php
session_start();
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
$userId = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
$conn->close();

if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('กรุณาเข้าสู่ระบบก่อนลงทะเบียน');
            window.location.href = '../html/login.html';
        </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Album</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css_use/style.css">
    <link rel="stylesheet" href="../css_use/styleactivity.css">
</head>
<body>
  <header>
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#" class="Logo">wellness<span>.</span></a>
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">about</a>
        <a href="#course">course</a>
        <a href="#activity">activity</a>
        <a href="#contact">contact</a>
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
<body>
  <div >
    <h1>กิจกรรมคลาสเรียนอูคูเลเล่</h1> 
  </div>

  <div class="photo-grid">
    <img src="/images/อูคูเลเล่.jpg" alt="Photo 1">
    <img src="/images/อูคูเลเล่1.jpeg" alt="Photo 2">
    <img src="/images/อูคูเลเล่2.jpg" alt="Photo 3">
    <img src="/images/อูคูเลเล่3.jpg" alt="Photo 4">
    <img src="/images/อูคูเลเล่3.jpg" alt="Photo 5">
    <img src="/images/อูคูเลเล่4.jpg" alt="Photo 6">
  </div>
   <div class="photo-grid">
    <img src="/images/อูคูเลเล่5.jpg" alt="Photo 7">
    <img src="/images/อูคูเลเล่6.jpg" alt="Photo 8">
    <img src="/images/อูคูเลเล่7.jpg" alt="Photo 9">
    <img src="/images/อูคูเลเล่8.jpg" alt="Photo 10">
    <img src="/images/อูคูเลเล่9.jpg" alt="Photo 11">
    <img src="/images/อูคูเลเล่10.jpg" alt="Photo 12">
  </div>
</body>
</html>