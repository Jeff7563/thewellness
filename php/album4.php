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
<h1 class="heading">กิจกรรมเต้นแอโรบิค</h1>
  <div class="photo-grid">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQjEvJ3jdPUrxzslTnsiBwNo6oN6KH_Fhc_w&s"lt="Photo 1">
    <img src="https://www.matichonacademy.com/wp-content/uploads/2022/10/LINE_ALBUM_%E0%B9%80%E0%B8%9E%E0%B9%89%E0%B8%99%E0%B8%97%E0%B9%8C%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7_221014_8.jpg" alt="Photo 2">
    <img src="https://thesmartlocal.ph/wp-content/uploads/2022/11/All-aBoard-XP-BGC-Takenoko-scaled.jpg" alt="Photo 3">
    <img src="https://www.matichonacademy.com/wp-content/uploads/2022/11/LINE_ALBUM_%E0%B9%80%E0%B8%9E%E0%B9%89%E0%B8%99%E0%B8%97%E0%B9%8C%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7_%E0%B9%92%E0%B9%92%E0%B9%90%E0%B9%99%E0%B9%93%E0%B9%90_15.jpg" alt="Photo 4">
   
  </div>
   <div class="photo-grid">
    <img src="https://image.dek-d.com/27/0497/7323/119594481" alt="Photo 7">
    <img src="https://image.dek-d.com/27/0497/7323/119594479" alt="Photo 8">
    <img src="https://www.uplay.it/bggimages/14996/1146379.jpg" alt="Photo 9" >
    <img src="https://p16-va.lemon8cdn.com/tos-alisg-v-a3e477-sg/owAAelEIEBglJO9f5UFQ08Dpp4OKD9EzDCFtAi~tplv-tej9nj120t-origin.webp" alt="Photo 10">
    
  </div>
  <div class="photo-grid">
    <img src="https://www.matichonacademy.com/wp-content/uploads/2022/11/LINE_ALBUM_%E0%B9%80%E0%B8%9E%E0%B9%89%E0%B8%99%E0%B8%97%E0%B9%8C%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7_%E0%B9%92%E0%B9%92%E0%B9%90%E0%B9%99%E0%B9%93%E0%B9%90_25_0.jpg" alt="Photo 5">
    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiejWXuWJOJY1o0vLngwpPgzsPkaKm0Oq4U1XVyuRS6HOaiYTBdM0F8Uck-qmOTIu_DUyFq5fspFreXlb9-gZKXaKuMpkqLlyeDh_T_7utHxOi8rkjdrFtt6cU4hdQmvY4wPimhxJ9P2WOp/s1600/IMG_20180607_113602.jpg" alt="Photo 6">
    <img src="https://pbs.twimg.com/media/ECGUk5hVUAAfNw2?format=jpg&name=large" alt="Photo 11">
    <img src="https://www.matichonacademy.com/wp-content/uploads/2022/10/LINE_ALBUM_%E0%B9%80%E0%B8%9E%E0%B9%89%E0%B8%99%E0%B8%97%E0%B9%8C%E0%B9%81%E0%B8%81%E0%B9%89%E0%B8%A7_221014_7.jpg" alt="Photo 12">
  </div>
</body>
</html>