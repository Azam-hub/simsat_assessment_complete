<?php

require "_config.php";
require "_functions.php";

$course_id = $_GET['course_id'];
// echo $course_id;
$msg = "";

$get_courses_sql = "SELECT * FROM `courses` WHERE `id`='$course_id'";
$get_courses_res = mysqli_query($conn, $get_courses_sql);

if (mysqli_num_rows($get_courses_res) == 0) {
    echo "401 - Unauthorized Access";
    die();
}
$get_courses_data = mysqli_fetch_assoc($get_courses_res);
$questions_to_ask = $get_courses_data['questions_to_ask'];


$get_questions_sql = "SELECT * FROM `questions` WHERE `course_id`='$course_id' AND `is_deleted`='0' ORDER BY RAND() LIMIT $questions_to_ask";
$get_questions_res = mysqli_query($conn, $get_questions_sql);

// if (mysqli_num_rows($get_courses_res) > 0) {
//     while ($) {
//         # code...
//     }
// } else {
    
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="src/css/_utils.css">
    <link rel="stylesheet" href="src/css/assessment.css">

    <link rel="shortcut icon" href="src/img/favicon.png" type="image/x-icon">

    <title>Assessment</title>
</head>
<body>
    <!-- <header class="row justify-content-between align-items-center border-bottom border-2 px-4 py-3 mx-0"> -->
    <header class="border-bottom border-2 mx-0">
        <div>
            <p class="bg-warning-subtle mb-0 py-1 text-center " style="font-size: 15px;">Designed and Developed by <q class="fw-bold">Muhammad Azam</q></p>
        </div>
        <div class="px-4 py-3 row justify-content-between align-items-center ">
            <div class="col-auto">
                <img src="src/img/logo.png" alt="Logo">
            </div>
            <div class="col-auto">
                <h4 class="m-0">Assessment of <q class="course-name"><?php echo $get_courses_data['name'] ?></q></h4>
                <p class="mb-0 text-center" >Timer: <span id="timer">59:59</span></p>
            </div>
            <div class="col-auto">
                <h6 class="m-0">Hi, <span id="student-name">Muhammad Azam</span></h6>
            </div>
        </div>
    </header>
    <div class="my-placeholder"></div>

    <section>
        <div class="content min-vh-100">

            <div class="get-started-div bg-white border border-1 border-black rounded-3 mt-4 px-4 py-3 ">
                <h2 class="border-bottom border-black text-center pb-2">Get Started</h2>
                <div class="mt-4">
                    <h3>Instructions</h3>
                    <ul>
                        <li>You will have 1 hour for assessment.</li>
                        <li>You must select an option for each question.</li>
                        <li>If time become over, the not attempted questions will marked as <b>skipped</b> and marks will deduct.</li>
                    </ul>
                    
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-secondary" id="get-started-btn">Get Started</button>
                    </div>
                </div>
            </div>

            <div class="questions-div">
                <?php
                $i = 0;
                // $total_no_questions = mysqli_num_rows($get_questions_res);
                if (mysqli_num_rows($get_questions_res) > 0) {
                    while ($row = mysqli_fetch_assoc($get_questions_res)) {
                        $correct_option = htmlentities($row['correct_option']);
                        $other_option_1 = htmlentities(json_decode($row['other_options'])[0]);
                        $other_option_2 = htmlentities(json_decode($row['other_options'])[1]);
                        $other_option_3 = htmlentities(json_decode($row['other_options'])[2]);
                        $options = [$correct_option, $other_option_1, $other_option_2, $other_option_3];
                        shuffle($options);
                
                        // echo print_r($options);
                        echo '
                
                        <div class="question-box" data-question-id="'.$row['id'].'" id="question-'.$row['id'].'">
                            <p>
                                <b>'.++$i.'.</b> '.htmlentities($row['question']).'
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </p>
                            <div>
                                <input type="radio" id="question-'.$i.'_option-1" name="question-'.$i.'" value="'.$options[0].'">
                                <label for="question-'.$i.'_option-1">'.$options[0].'</label>
                            </div>
                            <div>
                                <input type="radio" id="question-'.$i.'_option-2" name="question-'.$i.'" value="'.$options[1].'">
                                <label for="question-'.$i.'_option-2">'.$options[1].'</label>
                            </div>
                            <div>
                                <input type="radio" id="question-'.$i.'_option-3" name="question-'.$i.'" value="'.$options[2].'">
                                <label for="question-'.$i.'_option-3">'.$options[2].'</label>
                            </div>
                            <div>
                                <input type="radio" id="question-'.$i.'_option-4" name="question-'.$i.'" value="'.$options[3].'">
                                <label for="question-'.$i.'_option-4">'.$options[3].'</label>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo "No Questions added of this course.";
                }
                
                ?>
                
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary submit-btn" >Submit</button>
                </div>
            </div>
            
            <div class="result-div bg-white border border-1 border-black rounded-3 mt-4 px-4 py-3 ">
                <h2 class="border-bottom border-black text-center pb-2">Result</h2>
                <div class="mt-4 d-flex">
                    <div class="flex-grow-1">
                        <p class="mb-2 fw-medium">
                            Total Questions: 
                            <span class="fw-semibold" id="total-questions">12</span>
                        </p>
                        <p class="mb-0 fw-medium">
                            <span class="text-success">Correct Answers</span>: 
                            <span class="fw-semibold" id="correct-answers">4</span>
                        </p>
                        <p class="mb-0 fw-medium">
                            <span class="text-danger">Wrong Answers</span>: 
                            <span class="fw-semibold" id="wrong-answers">8</span>
                        </p>
                        <p class="mb-0 fw-medium">
                            Skipped Questions: 
                            <span class="fw-semibold" id="skipped-questions">0</span>
                        </p>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-2 fw-medium">
                            Total Marks: 
                            <span class="fw-semibold" id="total-marks">12</span>
                        </p>
                        <p class="mb-0 fw-medium">
                            Obtained Marks: 
                            <span class="fw-semibold" id="obtained-marks">4</span>
                        </p>
                        <p class="mb-0 fw-medium">
                            Percentage: 
                            <span class="fw-semibold" id="percentage">8</span>
                        </p>
                        <p class="mb-0 fw-medium">
                            Grade: 
                            <span class="fw-semibold" id="grade">0</span>
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-secondary" id="finish-btn">Finish</button>
                </div>
            </div>

        </div>
    </section>
</body>

<script src="src/jquery/jquery.js"></script>
<script src="src/bootstrap/js/bootstrap.min.js"></script>
<script src="src/fontawesome/js/all.min.js"></script>
<script src="src/js/lcoalstorageFunctions.js"></script>

<script>

    // function to add leading zeros
    function padWithLeadingZeros(num, totalLength) {
        return String(num).padStart(totalLength, '0');
    }

    // check if user logged in or not and time within limit
    let data = myLocalStorage.getValue("data")
    if (data == null) {
        location.href = "login.php?unauthorized=true"
    }
    data = JSON.parse(data)
    $("#student-name").text(data.name)
    
    // Answers
    let answers_obj = {};
    
    // On inputting answers store in answers_obj
    let inputs = Array.from($(".question-box input[type='radio']"))
    inputs.forEach(input => {
        $(input).change(function() {
            $(this).closest('.question-box').removeClass("danger")
            let question_id = $(this).closest('.question-box').attr("data-question-id"); // Get question ID
            let selectedOption = $(this).val(); // Get selected option
            
            // console.log(`Question ID: ${question_id}, Selected Answer: ${selectedOption}`);
            answers_obj[question_id] = selectedOption;            
        });
    });

    // Submitting logic
    $(".submit-btn").click(function () {

        // check all questions are answered or not
        let ok = true;
        let pending_question_id;
        let question_boxes = Array.from($(".question-box"));
        
        for (let i = 0; i < question_boxes.length; i++) {
            const question_box = question_boxes[i];

            let question_id = $(question_box).attr("data-question-id")

            if (!answers_obj[question_id]) {
                ok = false;
                pending_question_id = question_id;
                
                break;
            }
        }

        // if not scroll to that div
        if (!ok) {
            
            $(`#question-${pending_question_id}`).addClass("danger")            
            $('html, body').animate({
                scrollTop: $(`#question-${pending_question_id}`).offset().top - 140
            }, 500);
        } else {
            send_answers(data, answers_obj);
        }
    })
    
    // declare time for interval
    let time;

    $("#get-started-btn").click(function () {
        $(".get-started-div").hide()
        $(".questions-div").show()
        let seconds = 120;
        // let seconds = 3600;
        time = setInterval(() => {
            seconds--
            
            // Showing time
            let crr_minutes = padWithLeadingZeros(parseInt(seconds / 60), 2)
            let crr_seconds = padWithLeadingZeros(parseInt(seconds - (crr_minutes * 60)), 2)
            $("#timer").text(`${crr_minutes}:${crr_seconds}`)
    
            if (seconds == 0) {
                console.log("tims up");
                clearInterval(time)
    
                let question_boxes = Array.from($(".question-box"));
                for (let i = 0; i < question_boxes.length; i++) {
                    const question_box = question_boxes[i];
    
                    let question_id = $(question_box).attr("data-question-id")
    
                    if (!answers_obj[question_id]) {
                        // pending_question_ids.push(question_id)
                        answers_obj[question_id] = "skipped by student"
                    }
                }
    
                send_answers(data, answers_obj)
                
            }
        }, 1000)
    })
    
    // Logic to send answers at backend and get result and present
    function send_answers(user_data, answers_obj) {

        clearInterval(time)

        $.ajax({
            url: 'processors/answers_checker.php',
            type: 'POST',
            data: {
                user_data,
                answers: answers_obj
            },
            success: function(data) {
                // console.log(data);
                localStorage.removeItem("data")

                $(".questions-div").hide()
                $(".result-div").show()
                $("#timer").parent().hide()
                let result = JSON.parse(data)

                $('html, body').animate({ scrollTop: 0 }, 1000);
                // alert(`Result\nCorrect: ${result.number_of_correct}\nWrong: ${result.number_of_wrong}\nSkipped: ${result.number_of_skipped}`)

                let number_of_correct = parseInt(result["number_of_correct"]);
                let number_of_wrong = parseInt(result["number_of_wrong"]);
                let number_of_skipped = parseInt(result["number_of_skipped"]);
                
                let total_questions = parseInt(number_of_correct) + parseInt(number_of_wrong) + parseInt(number_of_skipped);
                let total_marks = total_questions;

                $("#total-questions").text(total_questions)
                $("#correct-answers").text(number_of_correct)
                $("#wrong-answers").text(number_of_wrong)
                $("#skipped-questions").text(number_of_skipped)

                $("#total-marks").text(total_marks)
                $("#obtained-marks").text(number_of_correct)

                let percentage = ((number_of_correct * 100) / total_marks).toFixed(2);
                $("#percentage").text(`${percentage}%`)

                let grade;
                if (percentage > 90) {
                    grade = "A+"
                } else if (percentage > 80) {
                    grade = "A1"
                } else if (percentage > 70) {
                    grade = "A"
                } else if (percentage > 60) {
                    grade = "B"
                } else if (percentage > 50) {
                    grade = "C"
                } else if (percentage > 40) {
                    grade = "D"
                } else {
                    grade = "FAIL!"
                }

                $("#grade").text(grade)
                // if (data == '1') {
                //     $('button[data-question-id="' + question_id + '"]').closest('tr').remove();
                // } else {
                //     alert('Something went wrong');
                // }
            }
        })
    }

    // Finish Button
    $("#finish-btn").click(function () {
        location.href = "login.php"
    })
</script>
</html>