<?php

require "../_config.php";
require "../_functions.php";

if (isset($_POST['data']) && isset($_POST['answers'])) {
    $data = $_POST['data'];
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

    echo json_encode([
        "number_of_correct" => $number_of_correct,
        "number_of_wrong" => $number_of_wrong,
        "number_of_skipped" => $number_of_skipped,
    ]);
    // while ($row = mysqli_fetch_assoc($get_correct_option_res)) {
    // }
    // 

}



?>