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
<h1 class="heading">กิจกรรมบอร์ดเกมรถไฟ</h1>
  <div class="photo-grid">
    <img src="https://th.bing.com/th/id/OIP.c047FeZcAwR3ptUeYSAynAHaE8?rs=1&pid=ImgDetMain" alt="Photo 1">
    <img src="https://image.bangkokbiznews.com/uploads/images/md/2022/05/ObS7NpK4gBKO1dPFs1p7.webp" alt="Photo 2">
    <img src="https://thesmartlocal.ph/wp-content/uploads/2022/11/All-aBoard-XP-BGC-Takenoko-scaled.jpg" alt="Photo 3">
    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjUo3mzju8AAAVrLN_Y87G-kFavolt2y7i2zdPrc-z8QfKc1JC2YWE7hXsopzpnHXa_L8E97INJpTKFRrIDZjoXG2vuER1nCfWcCxkGI0aRw5CXHb4R0zJJLR5Fdk47vD4dEecytAF-c5WT/s1600/IMG_20180428_154414.jpg" alt="Photo 4">
   
  </div>
   <div class="photo-grid">
    <img src="https://i.redd.it/ipd324n66cl61.jpg" alt="Photo 7">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Deskohran%C3%AD_08-09-27_212.jpg/640px-Deskohran%C3%AD_08-09-27_212.jpg" alt="Photo 8">
    <img src="https://www.uplay.it/bggimages/14996/1146379.jpg" alt="Photo 9" >
    <img src="https://www.uplay.it/bggimages/14996/1220301.jpg" alt="Photo 10">
    
  </div>
  <div class="photo-grid">
    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjZhpmTzHFdmFQRxoCxePAOcgBb4pWTeTBQ5wlESSLzZPzIY_uDtWDd9NLV2x3XwglTBbV6QA7B5KPyg3ke64KkGcekEbmcpJU5nz9xi-HyPGxFhLSfq3TFqpu77PWGu8PbyWdEY1iwRah7/s1600/IMG_20180428_145634.jpg" alt="Photo 5">
    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiejWXuWJOJY1o0vLngwpPgzsPkaKm0Oq4U1XVyuRS6HOaiYTBdM0F8Uck-qmOTIu_DUyFq5fspFreXlb9-gZKXaKuMpkqLlyeDh_T_7utHxOi8rkjdrFtt6cU4hdQmvY4wPimhxJ9P2WOp/s1600/IMG_20180607_113602.jpg" alt="Photo 6">
    <img src="https://www.uplay.it/bggimages/14996/1216204.jpg" alt="Photo 11">
    <img src="https://www.uplay.it/bggimages/14996/1228301.jpg" alt="Photo 12">
  </div>
</body>
</html>