<?php

require "../_config.php";

$data_conn = mysqli_connect("localhost", "root", "", "simsat_project_data");



$get_sql = "SELECT * FROM `questions` INNER JOIN `options` ON `questions`.`id`=`options`.`question_id`";
$get_res = mysqli_query($data_conn, $get_sql);

// $data = ;

while ($row = mysqli_fetch_assoc($get_res)) {
    
    // echo "<pre>";
    // // echo print_r($row);
    // echo "Question: ".htmlentities($row['question']);
    // echo "correct option: ".htmlentities($row['correct_option']);
    // echo "other option: ".htmlentities($row['other_options']);
    // echo "course id: ".htmlentities($row['course_id']);

    // echo "<br>";
    // echo "----------------------------------------------------------------------------------------------------------------------------------------------------";


    $question = mysqli_real_escape_string($conn, $row['question']);
    $correct_option = mysqli_real_escape_string($conn, $row['correct_option']);
    $other_options = mysqli_real_escape_string($conn, $row['other_options']);
    $course_id = mysqli_real_escape_string($conn, $row['course_id']);

    // $new_course_id = "";


    $insert_sql = "INSERT INTO `questions` (`question`, `correct_option`, `other_options`, `course_id`) 
    VALUES ('$question', '$correct_option', '$other_options', '$course_id')";
    $insert_res = mysqli_query($conn, $insert_sql);
}


// $get_options_sql = "SELECT * FROM `options`";



?>