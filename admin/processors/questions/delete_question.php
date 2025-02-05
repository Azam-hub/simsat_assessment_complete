<?php

require "../../../_config.php";

if (isset($_GET['question_id'])) {
    
    $question_id = $_GET['question_id'];

    $sql = "UPDATE `questions` SET `is_deleted` = '1' WHERE `id` = $question_id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
    
}


?>