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
    <img src="https://www.nesdc.go.th/images/article/news6355/n20161230132311_16307.jpg"lt="Photo 1">
    <img src="https://mpics.mgronline.com/pics/Images/559000012658007.JPEG" alt="Photo 2">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203041_640402.jpg" alt="Photo 3">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203050_640403.jpg" alt="Photo 4">
   
  </div>
   <div class="photo-grid">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203114_640406.jpg" alt="Photo 7">
    <img src="https://rph.co.th/wp-content/uploads/2023/10/03-1-1024x683.jpg" alt="Photo 8">
    <img src="https://rph.co.th/wp-content/uploads/2023/10/05-1-1024x683.jpg" alt="Photo 9" >
    <img src="https://rph.co.th/wp-content/uploads/2023/10/04-1-1024x683.jpg" alt="Photo 10">
    
  </div>
  <div class="photo-grid">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203201_640412.jpg" alt="Photo 5">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203017_640399.jpg" alt="Photo 6">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203237_640417.jpg" alt="Photo 11">
    <img src="https://cdc.parliament.go.th/ewtadmin/ewt/parliament_parcy/images/article/images2022/news85144/n20220321203129_640408.jpg" alt="Photo 12">
  </div>
</body>
</html>