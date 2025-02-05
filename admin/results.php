<?php

require "../_config.php";
require "_protected.php";
require "../_functions.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "components/css_links.php"; ?>

    <title>Results</title>
</head>

<body>
    <div class="modal fade" id="result-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="course-head">Result of <q id="student-name" class="fw-bold"></q></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="result p-3">
                    <!-- <div class="text-center border-bottom border-1 border-dark">
                        <h2>Result</h2>
                    </div> -->
                    <div class="row my-3">
                        <div class="col d-flex flex-column">
                            <div >
                                <p class="mb-2">
                                    <b>Total Questions:</b> <span id="total-questions"></span>
                                </p>
                            </div>
                            <div >
                                <p class="mb-0">
                                    <b class="text-success">Correct Answers:</b> <span id="correct-answers"></span>
                                </p>
                            </div>
                            <div >
                                <p class="mb-0">
                                    <b class="text-danger">Wrong Answers:</b> <span id="wrong-answers"></span>
                                </p>
                            </div>
                            <div >
                                <p class="mb-0">
                                    <b>Skipped Questions:</b> <span id="skipped-questions"></span>
                                </p>
                            </div>
                        </div>
    
                        <div class="col d-flex flex-column">
                            <p class="mb-2">
                                <b>Total marks:</b> <span id="total-marks"></span>
                            </p>
                            <p class="mb-0">
                                <b>Obtained marks:</b> <span id="obtained-marks"></span>
                            </p>
                            <p class="mb-0">
                                <b>Percentage:</b> <span id="percentage"></span> 
                            </p>
                            <p class="mb-0">
                                <b>Grade:</b> <span id="grade"></span> 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-success">Save</button> -->
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid ">

        <div class="row flex-nowrap h-100">

            <?php include "components/sidebar.php" ?>

            <div class=" content bg-light">
                
                <?php include "components/header.php" ?>

                <!-- -------------------------------- Main Content Yield ---------------------------------- -->
                <!-- @yield('content') -->
                <section class="py-3 px-2">
                    <div class="row flex-column">
                        <div class="col">
                            <h4 class="fw-semibold">Results</h4>
                        </div>
                        <div class="col mt-4">
                            <div class="table-responsive">
                                <table id="results-table" class="table table-striped table-bordered table-hover border-dark-subtle">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>G.R. No.</th>
                                            <th>Name</th>
                                            <th>Father Name</th>
                                            <th>Timing</th>
                                            <th>Course</th>
                                            <th>Teacher</th>
                                            <!-- <th>Total Question</th>
                                            <th>Correct Answers</th>
                                            <th>Wrong Answers</th>
                                            <th>Skipped Questions</th> -->
                                            <th>Action</th>
                                            <th>Added On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $get_results_sql = "SELECT courses.name AS course_name, results.id, results.name, results.father_name, results.gr, results.timing, results.teacher, results.number_of_correct, results.number_of_wrong, results.number_of_skipped, results.created_at 
                                        FROM `results` INNER JOIN `courses` ON `results`.`course_id`=`courses`.`id` WHERE `results`.`is_deleted`='0' ORDER BY `results`.`id` DESC";
                                        $get_results_res = mysqli_query($conn, $get_results_sql);

                                        $i = 0;

                                        if (mysqli_num_rows($get_results_res) > 0) {
                                            while ($row = mysqli_fetch_assoc($get_results_res)) {
                                                echo '
                                                <tr data-student-id="1">
                                                    <td>'.++$i.'.</td>
                                                    <td>'.$row['gr'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['father_name'].'</td>
                                                    
                                                    <td>'.\DateTime::createFromFormat('G', explode('-', $row['timing'])[0])->format('h:i a') . ' to ' . \DateTime::createFromFormat('G', explode('-', $row['timing'])[1])->format('h:i a').'</td>
                                                    <td>'.$row['course_name'].'</td>
                                                    <td>'.$row['teacher'].'</td>
                                                    <td>
                                                        <button 
                                                        class="btn btn-sm btn-primary view-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#result-modal" 
 
                                                        data-name="'.$row['name'].'" 
                                                        data-number_of_correct="'.$row['number_of_correct'].'" 
                                                        data-number_of_wrong="'.$row['number_of_wrong'].'" 
                                                        data-number_of_skipped="'.$row['number_of_skipped'].'" 

                                                        >View</button>
                                                        <button class="btn btn-sm btn-danger del-btn" data-result-id="1" data-name="azam" >Delete</button>
                                                    </td>
                                                    <td>' . date('h:i a <b>||</b> d M, Y', strtotime($row['created_at'])) . '</td>
                                                </tr>
                                                ';
                                            }
                                        } else {
                                            echo "No results to show.";
                                        }
                                        
                                        
                                        ?>
                                        <!-- <tr data-student-id="1">
                                            <td>1.</td>
                                            <td>gr</td>
                                            <td>Azam</td>
                                            <td>Ashraf</td>
                                            <td>11:00 to 12:00</td>
                                            <td>Web</td>
                                            <td>Ali</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary view-btn"  data-bs-toggle="modal" data-bs-target="#result-modal" data-result-id="1" data-name="azam" >View</button>
                                                <button class="btn btn-sm btn-danger del-btn" data-result-id="1" data-name="azam" >Delete</button>
                                            </td>
                                            
                                            <td>date</td>
                                        </tr> -->
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

<?php include "components/script_links.php"; ?>

<script>
    // Datatable initialization
    $('#results-table').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "aaSorting": []

    });


    $(".view-btn").click(function () {
        let name = $(this).data("name")
        let number_of_correct = parseInt($(this).data("number_of_correct"))
        let number_of_wrong = parseInt($(this).data("number_of_wrong"))
        let number_of_skipped = parseInt($(this).data("number_of_skipped"))

        let total_questions = parseInt(number_of_correct) + parseInt(number_of_wrong) + parseInt(number_of_skipped);
        let total_marks = total_questions;

        $("#student-name").text(name)

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

    })
</script>
</html>