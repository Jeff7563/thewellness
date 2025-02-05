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
$sql = "SELECT username FROM users WHERE user_id = ?";
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
<h1 class="heading">กิจกรรมคลาสเรียนอูคูเลเล่</h1>
  <div class="photo-grid">
    <img src="https://careagecenter.com/wp-content/uploads/2020/12/inf_musical_therapy.jpg"lt="Photo 1">
    <img src="https://image.makewebcdn.com/makeweb/r_260x260/YcDIjg5iR/content/IMG_3800.jpg?v=202405291424" alt="Photo 2">
    <img src="https://image.makewebcdn.com/makeweb/r_260x260/YcDIjg5iR/content/IMG_3743.jpg?v=202405291424" alt="Photo 3">
    <img src="https://mpics.mgronline.com/pics/Images/561000004423301.JPEG" alt="Photo 4">
   
  </div>
   <div class="photo-grid">
    <img src="https://mpics.mgronline.com/pics/Thumbnails/561000004423304.JPEG" alt="Photo 7">
    <img src="https://media.readthecloud.co/wp-content/uploads/2018/04/30130005/work-creative-bennetty-2.jpg" alt="Photo 8">
    <img src="https://buriramcity.go.th/images/activitys/2566/Social_Welfare_Division/music/347094916_774729504028264_1128019487164827871_n.jpg" alt="Photo 9" >
    <img src="https://static.thairath.co.th/media/Dtbezn3nNUxytg04ajX9GaotpALeSZ04DEuMekjAHvwbJr.webp" alt="Photo 10">
    
  </div>
  <div class="photo-grid">
    <img src="https://kinrehab.com/upload/images/web/%E0%B8%81%E0%B8%B4%E0%B8%88%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%9A%E0%B8%B3%E0%B8%9A%E0%B8%B1%E0%B8%94.png" alt="Photo 5">
    <img src="https://image.makewebcdn.com/makeweb/m_1920x0/YcDIjg5iR/content/IMG_3789.jpg?v=202405291424" alt="Photo 6">
    <img src="https://image.makewebcdn.com/makeweb/m_1920x0/YcDIjg5iR/content/IMG_3803.jpg?v=202405291424" alt="Photo 11">
    <img src="https://i.ytimg.com/vi/9HLNXhq3mU8/maxresdefault.jpg" alt="Photo 12">
  </div>
</body>
</html>