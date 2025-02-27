<?php

require "../_config.php";
require "_protected.php";
require "../_functions.php";

$user_id = $_SESSION['user_id'];

$msg = "";


if (isset($_POST['add-course'])) {
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $questions_to_ask = mysqli_real_escape_string($conn, $_POST['questions_to_ask']);

    $insert_sql = "INSERT INTO `courses` (`name`, `questions_to_ask`) VALUES ('$course_name', '$questions_to_ask')";
    $insert_res = mysqli_query($conn, $insert_sql);

    if ($insert_res) {
        $msg = success_msg('Course has been added successfully.');
    } else {
        $msg = danger_msg();
    }
}


if (isset($_POST['edit-course'])) {
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $questions_to_ask = mysqli_real_escape_string($conn, $_POST['questions_to_ask']);

    $insert_sql = "UPDATE `courses` SET `name` = '$course_name', `questions_to_ask` = '$questions_to_ask' WHERE `id` = '$course_id'";
    $insert_res = mysqli_query($conn, $insert_sql);

    if ($insert_res) {
        $msg = success_msg('Course has been added successfully.');
    } else {
        $msg = danger_msg();
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <?php include "components/css_links.php" ?>

    <title>Courses</title>
</head>

<body>
    <div class="modal fade" id="course-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="course-head">Add Course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    
                    <input type="hidden" id="course-id" name="course_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg mb-3">
                                <label for="course-name" class="form-label mb-1 required-label">Enter Course Name</label>
                                <input type="text" name="course_name" id="course-name" class="w-100 form-control shadow-sm py-2 rounded-3 border-1 " placeholder="Enter Course Name">
                                <span class="text-danger error-msg"></span>
                            </div>
                            <div class="col-lg mb-3">
                                <label for="questions-to-ask" class="form-label mb-1 required-label">Enter number of Questions to ask</label>
                                <input type="number" name="questions_to_ask" id="questions-to-ask" class="w-100 form-control shadow-sm py-2 rounded-3 border-1 " placeholder="Enter number">
                                <span class="text-danger error-msg"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-course" class="btn btn-success">Save</button>
                    </div>
                </form>
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
                    <?php echo $msg; ?>
                    <div class="row mb-4">
                        <div class="col">
                            <h5 class="fw-semibold">Add Course</h5>
                            <button class="btn btn-secondary" id="add-course-btn" data-bs-toggle="modal" data-bs-target="#course-modal">Add</button>
                            <!-- <button class="btn btn-secondary" id="add-course-btn">Add</button> -->
                        </div>
                    </div>
                    <div class="row flex-column ">
                        <div class="col">
                            <h5 class="fw-semibold">Courses</h5>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="course-table" class="table table-striped table-bordered table-hover border-dark-subtle">
                                    <thead>
                                        <tr>
                                            <th>S. No.</th>
                                            <th>Course Name</th>
                                            <th>Questions to ask</th>
                                            <th class="action-btns">Action</th>
                                            <th>Added On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $get_sql = "SELECT * FROM `courses` WHERE `is_deleted` = '0' ORDER BY `id` DESC";
                                        $get_res = mysqli_query($conn, $get_sql);
                                        $i = 1;

                                        while ($course = mysqli_fetch_assoc($get_res)) {
                                            echo '<tr>
                                                <td>' . $i++ . '</td>
                                                <td>' . $course['name'] . '</td>
                                                <td>' . $course['questions_to_ask'] . '</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary edit-course-btn" 
                                                        data-course-id="' . $course['id'] . '" 
                                                        data-course-name="' . $course['name'] . '" 
                                                        data-course-questions_to_ask="' . $course['questions_to_ask'] . '" 
                                                    >Edit</button>
                                                    <button class="btn btn-sm btn-danger del-btn" data-course-id="' . $course['id'] . '" data-course-name="' . $course['name'] . '">Delete</button>
                                                </td>
                                                <td>' . date('h:i a <b>||</b> d M, Y', strtotime($course['created_at'])) . '</td>
                                            </tr>';
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

<?php include "components/script_links.php" ?>

<script>
    $(document).ready(function() {
        // Datatable initialization
        $('#course-table').DataTable({
            dom: 'lBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "aaSorting": []

        });

        // form validation
        $('.modal form').submit(function(e) {
            
            // $('#course-modal').modal('show');
            if ($('#course-name').val() == "") {
                e.preventDefault();
                $('#course-name').addClass('is-invalid');
                $('#course-name').next().text('Course name is required');
            } else {
                $('#course-name').removeClass('is-invalid');
                $('#course-name').next().text('');
            }


            if ($('#questions-to-ask').val() == "") {
                e.preventDefault();
                $('#questions-to-ask').addClass('is-invalid');
                $('#questions-to-ask').next().text('Questions to ask is required');
            } else {
                $('#questions-to-ask').removeClass('is-invalid');
                $('#questions-to-ask').next().text('');
            }
            
        })

        // Add Course
        $('#add-course-btn').click(function() {

            // setting modal data
            $('#course-head').text('Add Course');
            $('#course-modal form button[type=submit]').attr("name", 'add-course');

            $('#course-id').val("");
            $('#course-name').val("");
            $('#questions-to-ask').val("");
            $('#course-modal').modal('show');
        })

        // Edit Course
        $(document).on("click", ".edit-course-btn", function() {

            // setting modal data
            $('#course-head').text('Edit Course');
            $('#course-modal form button[type=submit]').attr("name", 'edit-course');

            $('#course-id').val($(this).data('course-id'));
            $('#course-name').val($(this).data('course-name'));
            $('#questions-to-ask').val($(this).data('course-questions_to_ask'));
            $('#course-modal').modal('show');
        })

        // Delete Course
        $(document).on("click", ".del-btn", function() {
            let course_id = $(this).data('course-id');
            let course_name = $(this).data('course-name');

            // let del = confirm('Are you sure you want to delete ' + course_name + ' ?');
            // if (del) {
            // }
            
            custom_confirm(`Are you sure you want to delete <b>${course_name}</b>?`, function (is_confirmed) {
                if (is_confirmed) {
                    $.ajax({
                        url: 'processors/courses/delete_course.php',
                        type: 'GET',
                        data: {
                            course_id: course_id
                        },
                        success: function(data) {
                            if (data == '1') {
                                $('button[data-course-id="' + course_id + '"]').closest('tr').remove();
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