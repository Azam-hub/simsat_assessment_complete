<?php

require "../_config.php";

$user_id = $_SESSION['user_id'];

$get_user_sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
$get_user_res = mysqli_query($conn, $get_user_sql);
$user_data = mysqli_fetch_assoc($get_user_res);

$get_courses_sql = "SELECT * FROM `courses` WHERE `is_deleted`='0' ORDER BY `name`";
$get_courses_res = mysqli_query($conn, $get_courses_sql);

// $

?>



<div class=" sidebar pt-3 pb-2 d-flex flex-column justify-content-between">
    <div>
        <a href="index.php" class="text-decoration-none logo-row row align-items-center justify-content-center gap-2">
            <div class="col-auto px-0">
                <img src="../src/img/favicon.png" width="50px" class="logo" alt="">
            </div>
            <div class="right col-auto d-flex align-items-center px-0 position-relative">
                <h3 class="my-0">SIMSAT</h3>
                <span class="position-absolute badge rounded-2 bg-primary text-light fw-normal p-1" style="font-size: 10px; right: -29px; top: -7px;">
                    BETA
                </span>
            </div>
        </a>
        <hr class="border-2 border-white">
        <div class="row align-items-center px-1">
            <div class="left col-auto ps-2">
                <img src="../src/img/user.png"
                    onerror="this.onerror=null;this.src='../src/img/user.png';"
                    class="user-pic rounded-circle" alt="">
            </div>
            <div class="right col pe-2 ps-0 d-flex align-items-center text-center">
                <p class="mb-0"><?php echo $user_data['name']; ?></p>
            </div>
        </div>
        <hr class="border-2 border-white">

        <div class="link-section  mb-1">
            <div class="head d-flex justify-content-between cursor-pointer ">
                <a href="courses.php" class="w-100 row mx-0 p-2 py-2 bg-transparent text-decoration-none">
                    <div class="left col-auto px-0">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="right row col px-0 justify-content-between">
                        <div class="col">
                            <span class="ms-2">Courses</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="link-section  mb-1">
            <div class="head d-flex justify-content-between cursor-pointer ">
                <a href="results.php" class="w-100 row mx-0 p-2 py-2 bg-transparent text-decoration-none">
                    <div class="left col-auto px-0">
                        <i class="fa-solid fa-square-poll-vertical"></i>
                    </div>
                    <div class="right row col px-0 justify-content-between">
                        <div class="col">
                            <span class="ms-2">Results</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="link-section mb-1">
            <div class="head row mx-0 p-2 cursor-pointer   ">
                <div class="left col-auto px-0">
                    <i class="fa-solid fa-file-circle-question"></i>
                </div>
                <div class="right row col px-0 justify-content-between">
                    <div class="col">
                        <span class="ms-2">Set Questions</span>

                    </div>
                    <div class="col-auto">
                        <i class="chevron fa-solid fa-chevron-right"></i>

                    </div>
                </div>
            </div>
            <div class="ps-3 links">
                <div class="row flex-column border-start border-2">
                    <?php
                    
                    if (mysqli_num_rows($get_courses_res) > 0) {
                        while ($course = mysqli_fetch_assoc($get_courses_res)) {
                            
                            echo '
                            <a href="questions.php?course_id='.$course['id'].'" class="mx-0 col row mt-1 px-3 py-2 text-decoration-none">
                                <div class="col-auto px-0">'.$course['name'].'</div>
                            </a>';
                        }
                    } else {
                        echo '<p>No courses added.</p>';
                    }
                    
                    
                    ?>
                    <!-- <a href="#" class="mx-0 col row mt-1 px-3 py-2 text-decoration-none">
                        <div class="col-auto px-0">Graphics</div>
                    </a> -->
                    <!-- <p>No courses added.</p> -->

                </div>
            </div>
        </div>


    </div>
    <div class="right">
        <div class="row mx-0 mb-0 mt-4">
            <hr class="border-2 border-white mb-2">
            <p class="m-0 text-center" style="font-size: 13px">Designed and Developed by <b><q>Muhammad Azam</q></b></p>
        </div>
    </div>
</div>
<div class="placeholder"></div>