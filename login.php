<?php


require "_config.php";
require "_functions.php";

$msg = "";

if (isset($_GET['unauthorized']) && $_GET['unauthorized'] == true) {
    $msg = danger_msg("First Login with credentials.");
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="src/css/_utils.css">
    <link rel="stylesheet" href="src/css/login.css">

    <link rel="shortcut icon" href="src/img/favicon.png" type="image/x-icon">

    <title>Login</title>
</head>

<style>
    .alert {
        margin-bottom: 0 !important;
    }
</style>

<body>
    <?php echo $msg; ?>
    <div class="bg-body-tertiary d-flex justify-content-center align-items-center vh-100">
        <div class="box bg-white border rounded-2 py-3 px-3">
            <div class="d-flex justify-content-center">
                <img src="src/img/logo.png" alt="Logo">
            </div>
            <form class="mt-4" id="login_form">
                <h4 class="mb-3">Login</h4>
                <div class="mb-2 row gap-2 g-0">
                    <div class="col">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control shadow-sm" id="name" placeholder="Enter your Name">
                        <span class="text-danger error-msg"></span>
                    </div>
                    <div class="col">
                        <label for="father_name" class="form-label">Father Name</label>
                        <input type="text" class="form-control shadow-sm" id="father_name" placeholder="Enter your Father Name">
                        <span class="text-danger error-msg"></span>
                    </div>
                </div>
                <div class="mb-2 row gap-2 g-0">
                    <div class="col">
                        <label for="gr" class="form-label">GR No.</label>
                        <input type="number" class="form-control shadow-sm" id="gr" placeholder="Enter your GR No.">
                        <span class="text-danger error-msg"></span>
                    </div>
                    <div class="col">
                        <label for="timing" class="form-label">Select Timing</label>
                        <!-- <input type="text" class="form-control shadow-sm" id="" placeholder="Enter your Father Name"> -->
                        <select name="timing" id="timing" class="w-100 form-select shadow-sm py-2 rounded-3 border-1 ">
                            <option value="">-- Select Timing --</option>
                            <option value="11-12">11:00 am to 12:00 am</option>
                            <option value="12-13">12:00 am to 01:00 pm</option>
                            <option value="13-14">01:00 pm to 02:00 pm</option>
                            <option value="14-15">02:00 pm to 03:00 pm</option>
                            <option value="15-16">03:00 pm to 04:00 pm</option>
                            <option value="16-17">04:00 pm to 05:00 pm</option>
                            <option value="17-18">05:00 pm to 06:00 pm</option>
                            <option value="18-19">06:00 pm to 07:00 pm</option>
                            <option value="19-20">07:00 pm to 08:00 pm</option>
                            <option value="20-21">08:00 pm to 09:00 pm</option>
                            <option value="21-22">09:00 pm to 10:00 pm</option>
                        </select>
                        <span class="text-danger error-msg"></span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="gr" class="form-label">Select Course</label>
                    <!-- <input type="number" class="form-control shadow-sm" id="gr" placeholder="Enter your GR No."> -->
                    <select name="course" id="course" class="w-100 form-select shadow-sm py-2 rounded-3 border-1 ">
                        <option value="">-- Select Course --</option>

                        <?php

                        $get_courses_sql = "SELECT * FROM `courses` WHERE `is_deleted`='0' ORDER BY `name`";
                        $get_courses_res = mysqli_query($conn, $get_courses_sql);

                        if (mysqli_num_rows($get_courses_res) > 0) {
                            while ($course = mysqli_fetch_assoc($get_courses_res)) {
                                echo '
                                <option value="' . $course['id'] . '">' . $course['name'] . '</option>';
                            }
                        } else {
                            echo '<p>No courses added.</p>';
                        }

                        ?>

                    </select>
                    <span class="text-danger error-msg"></span>
                </div>
                <div class="mb-2">
                    <label for="teacher_name" class="form-label">Enter Teacher Name</label>
                    <input type="text" class="form-control shadow-sm" id="teacher_name" placeholder="Enter your Teacher Name">
                    <span class="text-danger error-msg"></span>
                </div>
                <button type="submit" class="mt-3 w-100 btn btn-primary">Login</button>
            </form>
            <p class="mt-3 mb-0 pt-2 text-center border-top border-secondary-subtle" style="font-size: 15px;">Designed and Developed by <q class="fw-bold">Muhammad Azam</q></p>
        </div>
    </div>
</body>
<!-- Scripts -->
<script src="src/jquery/jquery.js"></script>
<script src="src/bootstrap/js/bootstrap.min.js"></script>
<script src="src/fontawesome/js/all.min.js"></script>
<script src="src/js/lcoalstorageFunctions.js"></script>

<script>

    $("#login_form").submit(function(e) {
        e.preventDefault()

        let ok = true;
        
        let inputs = Array.from($('#login_form input, #login_form select'))
        inputs.forEach(input => {
            if ($(input).val() == "") {
                ok = false;
                $(input).next().text(`This field is required.`)
                $(input).addClass('is-invalid');
            } else {
                $(input).next().text("")
                $(input).removeClass('is-invalid');
            }
        });


        if (ok) {
            let formData = {
                name: $("#name").val(),
                father_name: $("#father_name").val(),
                gr: $("#gr").val(),
                timing: $("#timing").val(),
                course: $("#course").val(),
                teacher_name: $("#teacher_name").val()
            };
    
            myLocalStorage.setValue("data", JSON.stringify(formData), 4800000)   // 80 minutes = 1hr 20min
            location.href = `index.php?course_id=${$("#course").val()}`
        }
        
    })
</script>

</html>