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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-image: url('https://images.pexels.com/photos/807598/pexels-photo-807598.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover;">
  <div class="container-sm mt-4 rounded" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #cae5da;">
    <h3 class="mt-4">สมัครสมาชิก</h3>
    <hr>
    <form action="signup_dp.php" method="post">
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
        <?php echo $_SESSION['success']; ?>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php } ?>



<?php if (isset($_SESSION['warning'])) { ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['warning']; ?>
        <?php unset($_SESSION['warning']); ?>
    </div>
<?php } ?>
      
      <div class="mb-3">
        <label for="firstname" class="form-label">First name</label>
        <input type="text" class="form-control" name="firstname" aria-describedby="firstname">
      </div>
      <div class="mb-3">
        <label for="lastname" class="form-label">Last name</label>
        <input type="text" class="form-control" name="lastname" aria-describedby="lastname">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" aria-describedby="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="mb-3">
        <label for="cfpassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cfpassword" name="cfpassword">
      </div>
      
      <button type="submit" name="signup" class="btn btn-primary">Sign up</button>
    </form>
    <hr>
    <p>เป็นสมาชิกแล้ว คลิ๊กที่นี้ <a href="signin.php">เข้าสู่ระบบ</a></p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGFUS5srR8P3U8q3z5HRFVRzP1Lz4zSwo+KrYmoxst94" crossorigin="anonymous"></script>
</body>
</html>
