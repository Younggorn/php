<?php 

session_start();
require_once 'config/db.php';

if (isset($_POST['signin'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: signin.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: signin.php");
        exit();
    } elseif (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: signin.php");
        exit();
    } elseif (strlen($password) < 8 || strlen($password) > 20) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาว 8-20 ตัวอักษร';
        header("location: signin.php");
        exit();
    } else {
        try {
            // ตรวจสอบอีเมลซ้ำ
            $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {
                if ($email == $row['email']) {
                    if (password_verify($password, $row['password'])) {
                        if ($row['urole'] == 'admin') {
                            $_SESSION['admin_login'] = $row['id'];
                            header("location: admin.php");
                            exit();
                        } else {
                            $_SESSION['user_login'] = $row['id'];
                            header("location: user.php");
                            exit();
                        }
                    } else {
                        $_SESSION['error'] = 'รหัสผ่านผิด';
                        header("location: signin.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = 'อีเมลผิด';
                    header("location: signin.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                header("location: signin.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
