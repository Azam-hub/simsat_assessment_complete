<?php

require "../_config.php";
require "_protected.php";
require "../_functions.php";

$user_id = $_SESSION['user_id'];

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
} else {
    header("location: index.php");
}

$msg = "";

$get_course_sql = "SELECT name FROM `courses` WHERE `id`='$course_id'";
$get_course_res = mysqli_query($conn, $get_course_sql);
$course_data = mysqli_fetch_assoc($get_course_res);
$course_name = $course_data['name'];


if (isset($_POST['add-question'])) {
    $question = $_POST['question'];
    $correct_option = $_POST['correct_option'];
    $options =  $_POST['options'];

    $options = array_filter($options, function($value) {
        return !empty($value);  // Remove empty values
    });
    
    $other_options = json_encode($options);

    // $insert_sql = "INSERT INTO `questions` (`question`, `correct_option`, `other_options`, `course_id`) 
    // VALUES ('$question', '$correct_option', '$other_options', '$course_id')";
    // $insert_res = mysqli_query($conn, $insert_sql);


    $insert_sql = "INSERT INTO `questions` (`question`, `correct_option`, `other_options`, `course_id`) 
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insert_sql);

    mysqli_stmt_bind_param($stmt, "ssss", $question, $correct_option, $other_options, $course_id);
    $insert_res = mysqli_stmt_execute($stmt);

    if ($insert_res) {
        $msg = success_msg("Question has been added successfully.");
    }
}

if (isset($_POST['edit-question'])) {
    $question_id = $_POST['question_id'];
    $question = $_POST['question'];
    $correct_option = $_POST['correct_option'];
    $options =  $_POST['options'];

    $options = array_filter($options, function($value) {
        return !empty($value);  // Remove empty values
    });

    $other_options = json_encode($options);

    // $update_sql = "UPDATE `questions` SET `question`='$question', `correct_option`='$correct_option', `other_options`='$other_options', 
    // `course_id`='$course_id' WHERE `id`='$question_id'";
    // $update_res = mysqli_query($conn, $update_sql);

    $update_sql = "UPDATE `questions` SET `question`=?, `correct_option`=?, `other_options`=?, `course_id`=? WHERE `id`='$question_id'";

    $stmt = mysqli_prepare($conn, $update_sql);

    mysqli_stmt_bind_param($stmt, "ssss", $question, $correct_option, $other_options, $course_id);
    $update_res = mysqli_stmt_execute($stmt);

    if ($update_res) {
        $msg = success_msg("Question has been updated successfully.");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <?php include "components/css_links.php"; ?>

    <title>Questions</title>
</head>

<body>

    <!-- Question Modal -->
    <div class="modal fade" id="question-modal" tabindex="-1" aria-labelledby="question-head" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="question-head" >Add Questions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    
                    <input type="hidden" id="question-id" name="question_id">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="question" class="form-label mb-1 required-label">Enter Question</label>
                                <input type="text" name="question" id="question" class="w-100 form-control shadow-sm py-2 rounded-3 border-1" placeholder="Enter Question">
                                <span class="text-danger error-msg"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col mb-3">
                                <label for="correct-option" class="form-label mb-1 required-label">Enter Correct Option</label>
                                <input type="text" name="correct_option" id="correct-option" class="w-100 form-control shadow-sm py-2 rounded-3 border-1 " placeholder="Enter Correct Option">
                                <span class="text-danger error-msg"></span>
                            </div>
                        </div>
                        <div class="row flex-column">
                            <label for="other-options" class="col form-label mb-2 required-label">Enter Other Options</label>
                            <div class="col-lg-6 col mb-2">
                                <input type="text" name="options[]" id="other-option-1" class="w-100 form-control shadow-sm py-2 rounded-3 border-1 " placeholder="Enter Other Option 1">
                            </div>
                            <div class="col-lg-6 col mb-2">
                                <input type="text" name="options[]" id="other-option-2" class="w-100 form-control shadow-sm py-2 rounded-3 border-1 " placeholder="Enter Other Option 2">
                            </div>
                            <div class="col-lg-6 col mb-2">
                                <input type="text" name="options[]" id="other-option-3" class="w-100 form-control shadow-sm py-2 rounded-3 border-1 " placeholder="Enter Other Option 3">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-question" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid overflow-x-hidden">

        <div class="row flex-nowrap h-100">

            <?php include "components/sidebar.php"; ?>

            <div class=" content bg-light">
                
                <?php include "components/header.php"; ?>

                <!-- -------------------------------- Main Content Yield ---------------------------------- -->
                <!-- @yield('content') -->
                <section class="py-3 px-2">

                    <?php echo $msg; ?>

                    <div class="row justify-content-center mb-2">
                        <div class="col-auto">
                            <h3 class="text-center">Questions of <b class="d-sm-inline d-block"><q><?php echo $course_name; ?></q></b></h3>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <h5 class="fw-semibold">Add Question</h5>
                            <button class="btn btn-secondary" id="add-question-btn" data-bs-toggle="modal" data-bs-target="#question-modal">Add</button>
                            <!-- <button class="btn btn-secondary" id="add-question-btn">Add</button> -->
                        </div>
                    </div>
                    <div class="row flex-column ">
                        <div class="col">
                            <h5 class="fw-semibold">Questions</h5>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="question-table" class="table table-striped table-bordered table-hover border-dark-subtle">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Questions</th>
                                            <th>Correct Option</th>
                                            <th>Other Options</th>
                                            <th class="action-btns">Action</th>
                                            <th>Added On</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        
                                        $get_questions_sql = "SELECT * FROM `questions` WHERE `course_id`='$course_id' AND `is_deleted`='0' ORDER BY `id` DESC";
                                        $get_questions_res = mysqli_query($conn, $get_questions_sql);
                                        $i = 1;

                                        if (mysqli_num_rows($get_questions_res) > 0) {
                                            while ($question = mysqli_fetch_assoc($get_questions_res)) {
                                                echo '
                                                <tr>
                                                    <td>'.$i++.'.</td>
                                                    <td>'.htmlentities($question['question']).'</td>
                                                    <td class="text-break" style="width: 100px;">'.htmlentities($question['correct_option']).'</td>
                                                    <td>
                                                        <ul class="mb-0">';
                                                        $other_options_arr = json_decode($question['other_options']);
                                                        foreach ($other_options_arr as $other_option) {
                                                            echo '<li class="text-break">'.htmlentities($other_option).'</li>';
                                                        }
                                                        echo '</ul>
                                                    </td>
                                                    <td class="text-center ">
                                                        <!-- data-bs-toggle="modal" 
                                                        data-bs-target="#question-modal" -->
                                                        <button 
                                                        class="btn btn-sm btn-primary edit-question-btn" 
                                                        
                    
                                                        data-question-id="'.$question['id'].'" 
                                                        data-question="'.htmlentities($question['question']).'" 
                                                        data-question-correct_option="'.htmlentities($question['correct_option']).'"
                                                        data-question-other_options="'.htmlspecialchars($question['other_options']).'"';

                                                        // $other_options_arr = json_decode($question['other_options']);
                                                        // foreach ($other_options_arr as $other_option) {
                                                        //     echo 'data-question-other_options="'.htmlentities($other_option).'" ';
                                                        // }
                                                        
                                                        echo '>Edit</button>
                                                        <button class="btn btn-sm btn-danger del-btn" data-question-id="'.$question['id'].'">Delete</button>
                                                    </td>
                                                    <td>'.date('h:i a <b>||</b> d M, Y', strtotime($question['created_at'])).'</td>
                                                </tr> 
                                                ';
                                            }
                                        } else {
                                            echo "No question added";
                                        }
                                        
                                        
                                        ?>
                                                                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </section>
                
            </div>
        </div>
    </div>
</body>
<!-- Scripts -->
<?php include "components/script_links.php"; ?>

<script>
    $(document).ready(function() {
        // Datatable initialization
        $('#question-table').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "aaSorting": []

        });

        // form validation
        $('.modal form').submit(function(e) {
            
            let inputs = Array.from($('.modal form input[type=text]')).filter(input => input.name !== 'options[]');
            inputs.forEach(input => {
                if ($(input).val() == "") {
                    
                    e.preventDefault()
                    $(input).next().text(`This field is required.`)
                    $(input).addClass('is-invalid');
                    
                } else {
                    $(input).next().text("")
                    $(input).removeClass('is-invalid');
                }
            });
        })

        // Add Question
        $('#add-question-btn').click(function() {

            // setting modal data
            $('#question-head').text('Add Question');
            $('#question-modal form button[type=submit]').attr("name", 'add-question');

            $('#question-id').val("");
            $('#question').val("");
            $('#correct-option').val("");
            $('#other-option-1').val("");
            $('#other-option-2').val("");
            $('#other-option-3').val("");
            $('#question-modal').modal('show');
        })

        // Edit Question
        $(document).on("click", ".edit-question-btn", function() {

            // resetting other options field
            $('#other-option-1').val("");
            $('#other-option-2').val("");
            $('#other-option-3').val("");

            $('#question-head').text('Edit Question');
            $('#question-modal form button[type=submit]').attr("name", 'edit-question');

            $('#question-id').val($(this).data("question-id"));
            $('#question').val($(this).data("question"));
            $('#correct-option').val($(this).data("question-correct_option"));

            let other_options = $(this).data("question-other_options");
            
            for (let i = 0; i < other_options.length; i++) {
                const element = other_options[i];                
                $(`#other-option-${i+1}`).val(element);
            }

            $('#question-modal').modal('show');
        })

        // Delete Course
        $(document).on("click", ".del-btn", function() {
            let question_id = $(this).data('question-id');

            // let del = confirm('Are you sure you want to delete ' + course_name + ' ?');
            // if (del) {
            // }
            
            custom_confirm(`Are you sure you want to delete this question?`, function (is_confirmed) {
                if (is_confirmed) {
                    $.ajax({
                        url: 'processors/questions/delete_question.php',
                        type: 'GET',
                        data: {
                            question_id: question_id
                        },
                        success: function(data) {
                            if (data == '1') {
                                $('button[data-question-id="' + question_id + '"]').closest('tr').remove();
                            } else {
                                alert('Something went wrong');
                            }
                        }
                    })
                }
            });
        })
    
    })
</script>

</html>