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
    <link rel="stylesheet" href="../css/style.css">
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


<!-- cost section end  -->
<section class="course" id="course">
  <h1 class="heading">November <span>course</span></h1>
  <div class="card-container">
    <div class="card">
        <img src="../images/1.png" alt="Image 1">
        <p>Caption 1</p>
    </div>
    <div class="card">
        <img src="../images/2.png" alt="Image 2">
        <p>Caption 2</p>
    </div>
    <div class="card">
        <img src="../images/3.png" alt="Image 3">
        <p>Caption 3</p>
    </div>
    <div class="card">
        <img src="../images/5.png" alt="Image 4">
        <p>Caption 4</p>
    </div>
    <div class="card">
        <img src="../images/6.png" alt="Image 5">
        <p>Caption 5</p>
    </div>
    <div class="card">
        <img src="../images/7.png" alt="Image 6">
        <p>Caption 6</p>
    </div>
</div>
</section>
<!-- cost section end  -->


<!-- footer section strats  -->
<section class="footer" >
<div class="box-container11">

  <div class="box">
    <h3>quick links</h3>
      <a href="Index.php#home" id="home">Home</a>
      <a href="Index.php#about" id="about">about</a>
      <a href="Index.php#course" id="course">course</a>
      <a href="Index.php#concet" id="concet">contact</a>
    </div>

  <div class="box">
    <h3>contact info</h3>
    <a href="#">+123-456-7890</a>
    <a href="#">exzmple@gmail.com</a>
    <a href="#">Sakon Nakhon</a>
    <img src="../images/pay.png" alt="" width="50%" >
    <div class="footer-bottom">
      <p>&copy; 2025 บริษัทThe wellness Golden Time. สงวนลิขสิทธิ์.</p>
  </div>
  </div>
</div>




</section>