<?php

require "../../../_config.php";

if (isset($_GET['course_id'])) {
    
    $course_id = $_GET['course_id'];

    $sql = "UPDATE `courses` SET `is_deleted` = '1' WHERE `id` = $course_id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
    
}


?>