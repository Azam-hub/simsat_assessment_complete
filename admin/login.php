<?php

require '../_config.php';
require '../_functions.php';

session_start();
$msg = "";

if(isset($_SESSION['is_adminLoggedIn']) && $_SESSION['is_adminLoggedIn'] == true) {
    header('location: index.php');
}

if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    if(empty($email) || empty($password)) {
        $msg = danger_msg('All fields are required');
    } else {

        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
    
        if($row && password_verify($password, $row['password'])) {
            $_SESSION['is_adminLoggedIn'] = true;
            $_SESSION['user_id'] = $row['id'];
            // $_SESSION['name'] = $row['name'];
            // $_SESSION['email'] = $row['email'];
            header('location: index.php');
            // echo 'Login Success';
        } else {
            $msg = danger_msg('Invalid Email or Password');
        }
    }

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../src/fonts/fonts.css">
    <link rel="stylesheet" href="../src/css/_utils.css">
    <link rel="stylesheet" href="src/css/login.css">

    <link rel="shortcut icon" href="../src/img/favicon.png" type="image/x-icon">

    <title>Login</title>
</head>

<body>

    <?php echo $msg; ?>

    <div class="bg-body-tertiary d-flex justify-content-center align-items-center vh-100">
        <div class="box bg-white border rounded-3 py-4 px-4">
            <div class="d-flex justify-content-center">
                <img src="../src/img/logo.png" alt="Logo">
            </div>
            <form class="mt-4" method="POST">
                <h4 class="mb-3">Login</h4>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Enter Email</label>
                    <input type="email" name="email" class="form-control shadow-sm" id="email" placeholder="Enter your Email">
                </div>
                <div class="mb-3">
                    <label for="teacher_name" class="form-label">Enter Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control shadow-sm" id="teacher_name" placeholder="Enter your Password">
                        <i class="eye-icon fas fa-eye"></i>
                        <!-- <i class="eye-icon d-none fa-regular fa-eye-slash"></i> -->
                    </div>
                </div>
                <button type="submit" name="login" class=" w-100 btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</body>
<!-- Scripts -->
<script src="../src/jquery/jquery.js"></script>
<script src="../src/bootstrap/js/bootstrap.min.js"></script>
<script src="../src/fontawesome/js/all.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", '.eye-icon', function() {
            console.log('clicked');
            
            // $(this).toggleClass('d-none');
            if ($(this).hasClass('fa-eye')) {
                $(this).removeClass('fa-eye');
                $(this).addClass('fa-eye-slash');
                
            } else {
                $(this).addClass('fa-eye');
                $(this).removeClass('fa-eye-slash');
            }
            $(this).siblings('input').attr('type', function(index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });
        });
    });
</script>
</html>