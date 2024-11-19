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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+uamcpPePT9W6zDkQW6xgL2e3pGh"
        crossorigin="anonymous"></script>
    <style>
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

        .row {
            font-size: xx-large;


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
            <a href="logout.php">Logout</a>
        </div>
        <div class="welcome-text">
            <p>Wellcome, <?php echo $row['firstname'] . ' ' . $row['lastname']; ?></p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <h1 class="text-white">About us</h1>
            <!-- Add the rest of your content here -->
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">

                        <h3 class="mb-3 text-white">xGornx </h3>
                        <p class="text-white" style="text-indent: 50px;">

                            นาย พันกรณ์ เพ็ชรน้อย เรียนชั้นปีที่ 3 มหาวิทยาลัย มหานครเทคโนโลยี เลขประจำตัว 6511130059
                        </p>


                    </div>
                    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
                        <img src="images/about/2.webp" class="w-100">
                    </div>



                </div>
            </div>

            <h1 class="text-white">Management team</h1>

            <div class="container px-4 mt-5">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper mb-4">

                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="images/team/1.webp" class="w-100">
                            <h5 class="mt-2">นาย A</h5>
                        </div>

                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="images/team/2.webp" class="w-100">
                            <h5 class="mt-2">นาย B</h5>
                        </div>

                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="images/team/3.webp" class="w-100">
                            <h5 class="mt-2">นาย C</h5>
                        </div>

                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="images/team/4.webp" class="w-100">
                            <h5 class="mt-2">นาย D</h5>
                        </div>

                        <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                            <img src="images/team/5.webp" class="w-100">
                            <h5 class="mt-2">นาย F</h5>
                        </div>



                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <!-- Swiper JS -->
                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

                <!-- Initialize Swiper -->
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        slidesPerView: 4,
                        spaceBetween: 40,
                        pagination: {
                            el: ".swiper-pagination",
                        },
                    });
                </script>
            </div>





        </div>
    </div>
</body>

</html>