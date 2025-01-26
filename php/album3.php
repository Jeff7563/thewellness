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
        <a href="./Index.php#home">Home</a>
        <a href="./Index.php#about">about</a>
        <a href="./Index.php#course">course</a>
        <a href="./Index.php##activity">activity</a>
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
<body>
<h1 class="heading">กิจกรรมเพ้นท์แก้วเซรามิค</h1>
<div class="photo-grid">
    <img src="https://pbs.twimg.com/media/ECY3cHuUcAA8kpD?format=jpg&name=4096x4096"lt="Photo 1">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRfadZUKUaOFz_PjEAm92S1BGo5lxgmu_DnjdBBMWE-W2GIxCqC6S8yTl1c3sNLIUVO9g&usqp=CAU" alt="Photo 2">
    <img src="https://pbs.twimg.com/media/ECY3acYUwAAuOuk?format=jpg&name=4096x4096" alt="Photo 3">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1rbSdMy14NHJcKgmNLD0grjdmbndfebAnF2BSU2OGB8qOLJ81vXB2I2Rfg8IKLSumg9E&usqp=CAU" alt="Photo 4">
   
  </div>
   <div class="photo-grid">
    <img src="https://www.matichonacademy.com/wp-content/uploads/2022/11/LINE_ALBUM_%E0%B9%80%E0%B8%9E%E0%B9%89%E0%B8%99%E0%B8%97%E0%B9%8C%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7_%E0%B9%92%E0%B9%92%E0%B9%90%E0%B9%99%E0%B9%93%E0%B9%90_6.jpg" alt="Photo 7">
    <img src="https://www.matichon.co.th/wp-content/uploads/2022/10/01-8-2-1024x576.jpg" alt="Photo 8">
    <img src="https://pbs.twimg.com/media/ECGUk5hVUAAfNw2?format=jpg&name=large" alt="Photo 9" >
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKnoA3OTAW4Te44aZWkvU2P2VBamAiLqsJMQ&s" alt="Photo 10">
    
  </div>
  <div class="photo-grid">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3krSJwzX31MJ96M_ypYZTS1nhPHVLAL9GZg&s" alt="Photo 5">
    <img src="https://p16-va.lemon8cdn.com/tos-alisg-v-a3e477-sg/owAAelEIEBglJO9f5UFQ08Dpp4OKD9EzDCFtAi~tplv-tej9nj120t-origin.webp" alt="Photo 6">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSe9IDuJEXtuSTGUBDCWC26sxn2_rDvssCgZ--psEBSYCnqIFMq3jECN21lJxUvaInOCnM&usqp=CAU" alt="Photo 11">
    <img src="https://www.matichonacademy.com/wp-content/uploads/2022/11/LINE_ALBUM_%E0%B9%80%E0%B8%9E%E0%B9%89%E0%B8%99%E0%B8%97%E0%B9%8C%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7_%E0%B9%92%E0%B9%92%E0%B9%90%E0%B9%99%E0%B9%93%E0%B9%90_25_0.jpg" alt="Photo 12">
  </div>
</body>
</html>