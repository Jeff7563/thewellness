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
    <title>User Display</title>
</head>
<body>

<div class="language-selector">
</div>

</body>
</html>

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


<!-- home section starts -->
<section class="home" id="home">

<div class="content">
  <h3>Thewellness</h3>
  <span>Golden Time</span>
  <p>ศูนย์ส่งเสริมสุขภาพผู้สูงอายุในหลายด้านและมีกิจกรรมอีกมากหมาย</p>
  <a href="#" class="btn">เข้าร่วมกิจกรรม</a>
</div>
</section>
<!-- home section end -->


<!-- about section starts -->
<section class="about" id="about">
  <h1 class="heading"> <span>about</span> us </h1>
  <div class="row">
    <div class="images-container" >
      <img src="../images/หน้าabout.jpeg" alt="" >
    </div>

    <div class="content">
      <h2>why choose us?</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem autem ab soluta reiciendis quaerat exercitationem asperiores eveniet, iste sequi accusantium impedit ratione nam cum excepturi, minus voluptatum ut expedita. Corporis!</p>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus, recusandae quae praesentium corporis atque hic minus illum facilis porro eum commodi tenetur velit aperiam ipsum quaerat omnis. Cumque, consequatur delectus?</p>
      <a href="#" class="btn">learn</a>

    </div>
  </div>
</section>

<!-- about section end  -->

<!-- course section start  -->
<section class="course" id="course">
  <h1 class="heading">November <span>course</span></h1>
  <div class="card-container">
    <div class="card">
        <img src="../images/1.png" alt="Image 1" >
        <a href="./coures1.php">Caption 1</a>
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

<!-- concet section strats  -->
<section class="contact" id="contact">
  <h1 class="heading">contact <span>us</span></h1>
<div class="row">

  <form action="">
    <input type="text" placeholder="name" class="box">
    <input type="email" placeholder="email" class="box">
    <input type="number" placeholder="namber" class="box">
    <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="send message" class="btn" >
  </form>
  <div class="image">
    <img src="../images/Contact1.jpg" alt="">
  </div>
</div>

</section>
<!-- concet section end  -->

<!-- footer section strats  -->
<section class="footer" >
<div class="box-container11">

  <div class="box">
  <h3>quick links</h3>
    <a href="#home">Home</a>
    <a href="#about">about</a>
    <a href="#course">course</a>
    <a href="#contact">contact</a>
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