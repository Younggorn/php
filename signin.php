<?php 
session_start();
require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+uamcpPePT9W6zDkQW6xgL2e3pGh" crossorigin="anonymous"></script>
    <style>
      .container{
        color: white;
        background-color: rgba(0, 0, 0, 0.8);
      }

      .f
    </style>
  </head>
<body style="background-image: url('https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover;">
  <div class="container mt-4 rounded" style="max-width: 600px; margin: 0 auto; padding: 20px; ">
    <h3 class="mt-4">เข้าสู่ระบบ</h3>
    <hr>
    <form action="signin_dp.php" method="post">

    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php
          echo htmlspecialchars($_SESSION['error']);
          unset($_SESSION['error']);
          ?>
        </div>
      <?php } ?> 

      <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php echo htmlspecialchars($_SESSION['success']); ?>
          <?php unset($_SESSION['success']); ?>
        </div>
      <?php } ?>
  
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" aria-describedby="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
  
      <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
    </form>
    <hr>
    <p>ยังไม่สมัครสมาชิก คลิ๊กที่นี้ <a href="index.php">สมัครสมาชิก</a></p>
  </div>

</body>
</html>
