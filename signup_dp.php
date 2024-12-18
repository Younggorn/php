<?php 

session_start();
require_once 'config/db.php';

if (isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cfpassword = $_POST['cfpassword'];
    $urole = 'user';

    if (empty($firstname)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อ';
        header("location: index.php");
        exit();
    } elseif (empty($lastname)) {
        $_SESSION['error'] = 'กรุณากรอกนามสกุล';
        header("location: index.php");
        exit();
    } elseif (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: index.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: index.php");
        exit();
    } elseif (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: index.php");
        exit();
    } elseif (strlen($password) < 8 || strlen($password) > 20) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาว 8-20 ตัวอักษร';
        header("location: index.php");
        exit();
    } elseif (empty($cfpassword)) {
        $_SESSION['error'] = 'กรุณากรอก ยืนยันรหัสผ่าน';
        header("location: index.php");
        exit();
    } elseif ($password != $cfpassword) {
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
        header("location: index.php");
        exit();
    }  else {
        try {
            // ตรวจสอบอีเมลซ้ำ
            $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['email'] == $email) {
                $_SESSION['warning'] = "มีอีเมลนี้ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี้</a>";
                header("location: index.php");
                exit();
            } elseif (!isset($_SESSION['error'])) {
                // บันทึกข้อมูลผู้ใช้ใหม่
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, urole)
                                        VALUES (:firstname, :lastname, :email, :password, :urole)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();

                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: index.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
