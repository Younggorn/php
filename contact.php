<?php

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: signin.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+uamcpPePT9W6zDkQW6xgL2e3pGh"
        crossorigin="anonymous"></script>
    <style>

@import 'bootstrap-icons/font/bootstrap-icons.css';

        body {
            background-image: url('https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            width: 250px;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

       

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .welcome-text {
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['user_login'])) {
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <a href="user.php">Home</a>
            <a href="#profile">Profile</a>
            <a href="#history">ประวัติการจอง</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="logout.php" class="logout"> <i class="bi bi-box-arrow-right"></i> Logout</a>

        </div>
        <div class="welcome-text">
            <p>Wellcome, <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <h1 class="text-white">Contact</h1>
            <!-- Add the rest of your content here -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-5 px-4 mt-3">
                        <div class="bg-white rounded shadow p-4">
                            <iframe class="w-100 rounded mb-4" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3873.9467425226!2d100.8529154758661!3d13.842235395191777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d6e3ac6abca21%3A0xf46a3686886c4718!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LmA4LiX4LiE4LmC4LiZ4LmC4Lil4Lii4Li14Lih4Lir4Liy4LiZ4LiE4Lij!5e0!3m2!1sth!2sth!4v1731846235847!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <h5>Address</h5>
                            <a href="https://maps.app.goo.gl/48ukBSZ2b1ovQs747" targer="_blank" class="d-inline-block text-decoration-none text-dark">
                            <i class="bi bi-geo-alt-fill"></i> 140 ถนน เชื่อมสัมพันธ์ แขวงกระทุ่มราย เขตหนองจอก กรุงเทพมหานคร 10530

                            </a>
                        </div>
                    </div>



                </div>
            </div>


        </div>
    </div>
</body>

</html>