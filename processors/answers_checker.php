<?php

require "../_config.php";
require "../_functions.php";

if (isset($_POST['user_data']) && isset($_POST['answers'])) {
    $data = $_POST['user_data'];
    $answers = $_POST['answers'];

    // echo print_r($data);
    // echo "-----------------------------------";
    // echo print_r($answers);

    $number_of_correct = 0;
    $number_of_wrong = 0;
    $number_of_skipped = 0;
    
    foreach ($answers as $question_id => $answer) {
        if ($answer == "skipped by student") {
            $number_of_skipped = $number_of_skipped + 1;
        } else {
            $get_correct_option_sql = "SELECT correct_option FROM `questions` WHERE `id`='$question_id'";
            $get_correct_option_res = mysqli_query($conn, $get_correct_option_sql);
            
            $correct_option_data = mysqli_fetch_assoc($get_correct_option_res);
            $correct_option = $correct_option_data['correct_option'];
    
            if ($correct_option == $answer) {
                $number_of_correct = $number_of_correct + 1;
            } else {
                $number_of_wrong = $number_of_wrong + 1;
            }
        }
    }

    // {"name":"Muhammad Azam","father_name":"Ashraf","gr":"1212","timing":"12-13","course":"3","teacher_name":"12qw"}
    $name = mysqli_real_escape_string($conn, $data['name']);
    $father_name = mysqli_real_escape_string($conn, $data['father_name']);
    $gr = mysqli_real_escape_string($conn, $data['gr']);
    $timing = mysqli_real_escape_string($conn, $data['timing']);
    $course = mysqli_real_escape_string($conn, $data['course']);
    $teacher_name = mysqli_real_escape_string($conn, $data['teacher_name']);

    $insert_sql = "INSERT INTO `results`(`name`, `father_name`, `gr`, `timing`, `course_id`, `teacher`, `number_of_correct`, `number_of_wrong`, `number_of_skipped`) 
    VALUES ('$name','$father_name','$gr','$timing','$course','$teacher_name','$number_of_correct','$number_of_wrong','$number_of_skipped')";
    $insert_res = mysqli_query($conn, $insert_sql);

    echo json_encode([
        "number_of_correct" => $number_of_correct,
        "number_of_wrong" => $number_of_wrong,
        "number_of_skipped" => $number_of_skipped,
    ]);
}



?>