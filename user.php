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
            <h1 class="text-white">Room Booking</h1>
            <!-- Add the rest of your content here -->

            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="images/rooms/1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5>MeetingRoom 1</h5>
                                <h4 class="mb-4 badge rounded-pill bg-success text-white text-wrap fs-6">Normal </h4>

                                <div class="features mb-4">
                                    <h6 class="mb-1">ที่อยู่ห้อง</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ตึก MII
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ชั้น 2
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        เลขห้อง 206
                                    </span>
                                </div>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ทีวิ 2 ตัว
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ปลั๊ก 2 เต้า
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        รองรับได้ 20 คน
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-dark   shadow-none" style="background-color: #a0d8ff ; width: 110px;">จองห้อง</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">ข้อมูลเพิ่มเติม</a>

                                </div>


                            </div>



                        </div>


                    </div>

                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="images/rooms/1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5>MeetingRoom 1</h5>
                                <h4 class="mb-4 badge rounded-pill bg-success text-white text-wrap fs-6">Normal </h4>

                                <div class="features mb-4">
                                    <h6 class="mb-1">ที่อยู่ห้อง</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ตึก MII
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ชั้น 2
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        เลขห้อง 206
                                    </span>
                                </div>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ทีวิ 2 ตัว
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ปลั๊ก 2 เต้า
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        รองรับได้ 20 คน
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-dark   shadow-none" style="background-color: #a0d8ff ; width: 110px;">จองห้อง</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">ข้อมูลเพิ่มเติม</a>

                                </div>


                            </div>



                        </div>


                    </div>

                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="images/rooms/1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5>MeetingRoom 1</h5>
                                <h4 class="mb-4 badge rounded-pill bg-success text-white text-wrap fs-6">Normal </h4>

                                <div class="features mb-4">
                                    <h6 class="mb-1">ที่อยู่ห้อง</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ตึก MII
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ชั้น 2
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        เลขห้อง 206
                                    </span>
                                </div>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ทีวิ 2 ตัว
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ปลั๊ก 2 เต้า
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        รองรับได้ 20 คน
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-dark   shadow-none" style="background-color: #a0d8ff ; width: 110px;">จองห้อง</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">ข้อมูลเพิ่มเติม</a>

                                </div>


                            </div>



                        </div>


                    </div>

                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="images/rooms/1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5>MeetingRoom 1</h5>
                                <h4 class="mb-4 badge rounded-pill bg-success text-white text-wrap fs-6">Normal </h4>

                                <div class="features mb-4">
                                    <h6 class="mb-1">ที่อยู่ห้อง</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ตึก MII
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ชั้น 2
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        เลขห้อง 206
                                    </span>
                                </div>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ทีวิ 2 ตัว
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ปลั๊ก 2 เต้า
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        รองรับได้ 20 คน
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-dark   shadow-none" style="background-color: #a0d8ff ; width: 110px;">จองห้อง</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">ข้อมูลเพิ่มเติม</a>

                                </div>


                            </div>



                        </div>


                    </div>

                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="images/rooms/1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5>MeetingRoom 1</h5>
                                <h4 class="mb-4 badge rounded-pill bg-success text-white text-wrap fs-6">Normal </h4>

                                <div class="features mb-4">
                                    <h6 class="mb-1">ที่อยู่ห้อง</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ตึก MII
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ชั้น 2
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        เลขห้อง 206
                                    </span>
                                </div>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ทีวิ 2 ตัว
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ปลั๊ก 2 เต้า
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        รองรับได้ 20 คน
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-dark   shadow-none" style="background-color: #a0d8ff ; width: 110px;">จองห้อง</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">ข้อมูลเพิ่มเติม</a>

                                </div>


                            </div>



                        </div>


                    </div>

                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <img src="images/rooms/1.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5>MeetingRoom 1</h5>
                                <h4 class="mb-4 badge rounded-pill bg-success text-white text-wrap fs-6">Normal </h4>

                                <div class="features mb-4">
                                    <h6 class="mb-1">ที่อยู่ห้อง</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ตึก MII
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ชั้น 2
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        เลขห้อง 206
                                    </span>
                                </div>

                                <div class="features mb-4">
                                    <h6 class="mb-1">Features</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ทีวิ 2 ตัว
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        ปลั๊ก 2 เต้า
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        รองรับได้ 20 คน
                                    </span>
                                </div>
                                <div class="d-flex justify-content-evenly mb-2">
                                    <a href="#" class="btn btn-sm text-dark   shadow-none" style="background-color: #a0d8ff ; width: 110px;">จองห้อง</a>
                                    <a href="#" class="btn btn-sm btn-outline-dark shadow-none">ข้อมูลเพิ่มเติม</a>

                                </div>


                            </div>



                        </div>


                    </div>

                </div>
            </div>


        </div>
    </div>
</body>

</html>