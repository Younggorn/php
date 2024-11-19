
<?php 

    session_start();
    require_once 'config/db.php';
    if(!isset($_SESSION['admin_login'])){
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php 
    
    if(isset($_SESSION['admin_login'])){
        $admin_id = $_SESSION['admin_login'];
        $stmt = $conn-> query("SELECT * FROM users WHERE id = $admin_id");
        $stmt ->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    
    ?>


        <h3 class="mt-4"> Wellcome Admin, <?php echo $row['firstname'].' '. $row['lastname']?></h3>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>