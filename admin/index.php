<?php

require "../_config.php";
require "_protected.php";
require "../_functions.php";

$user_id = $_SESSION['user_id'];

$msg = "";


if (isset($_POST['update-email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $update_sql = "UPDATE `users` SET `email`='$email' WHERE `id`='$user_id'";
    $update_res = mysqli_query($conn, $update_sql);

    if ($update_res) {
        $msg = success_msg('Email has been updated successfully.');
    } else {
        $msg = danger_msg();
    }
}

if (isset($_POST['update-password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);

    $db_password = $data['password'];

    if (!password_verify($old_password, $db_password)) {
        $msg = danger_msg('Old Password is Incorrect!');
    } else {
        if ($new_password !== $confirm_password) {
            $msg = danger_msg('Password and Confirm Password does not match.');
        } else {

            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            $update_sql = "UPDATE `users` SET `password`='$hashed_password' WHERE `id`='$user_id'";
            $update_res = mysqli_query($conn, $update_sql);

            if ($update_res) {
                $msg = success_msg('Password has been updated successfully.');
            } else {
                $msg = danger_msg('Something went wrong! Please try again.');
            }
        }
    }
}


if (isset($_POST['update-name'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $update_sql = "UPDATE `users` SET `name`='$name' WHERE `id`='$user_id'";
    $update_res = mysqli_query($conn, $update_sql);

    if ($update_res) {
        $msg = success_msg('Name has been updated successfully.');
    } else {
        $msg = danger_msg();
    }
}


$sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

$db_name = $data['name'];
$db_email = $data['email'];
$db_password = $data['password'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "components/css_links.php" ?>

    <title>Home</title>
</head>

<body>
    <div class="container-fluid ">

        <div class="row flex-nowrap h-100">

            <?php include "components/sidebar.php" ?>

            <div class=" content bg-light">

                <?php include "components/header.php" ?>

                <!-- -------------------------------- Main Content Yield ---------------------------------- -->
                
                <section class="py-3 px-2">
                    <?php echo $msg; ?>
                    <div class="row">
                        <form method="POST" class="col">
                            <label for="name" class="fw-semibold">Update Name</label>
                            <input type="name" id="name" name="name" class="form-control shadow-sm my-2" placeholder="Enter Name" value="<?php echo $db_name; ?>">
                            <button type="submit" class="btn btn-secondary" name="update-name" id="add-question-btn">Update</button>
                        </form>
                        <form method="POST" class="col">
                            <label for="email" class="fw-semibold">Update Email</label>
                            <input type="email" id="email" name="email" class="form-control shadow-sm my-2" placeholder="Enter Email" value="<?php echo $db_email; ?>">
                            <button type="submit" class="btn btn-secondary" name="update-email" id="add-question-btn">Update</button>
                        </form>
                    </div>
                    <div class="row mt-3">

                        <form method="POST" class="col">
                            <label class="fw-semibold">Update Password</label>
                            <!-- <label class="fw-semibold">Enter Old Password</label> -->
                            <div class="position-relative">
                                <input type="password" name="old_password" class="form-control shadow-sm my-2" id="teacher_name" placeholder="Enter Old Password">
                                <i class="eye-icon fas fa-eye"></i>
                            </div>
                            <div class="position-relative">
                                <input type="password" name="new_password" class="form-control shadow-sm my-2" id="teacher_name" placeholder="Enter New Password">
                                <i class="eye-icon fas fa-eye"></i>
                            </div>
                            <div class="position-relative">
                                <input type="password" name="confirm_password" class="form-control shadow-sm my-2" id="teacher_name" placeholder="Enter Confirm Password">
                                <i class="eye-icon fas fa-eye"></i>
                            </div>
                            <button type="submit" class="btn btn-secondary" name="update-password" id="add-question-btn">Update</button>
                        </form>

                        <div class="col"></div>
                    </div>

                </section>

            </div>
        </div>
    </div>
</body>

<?php include "components/script_links.php" ?>

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