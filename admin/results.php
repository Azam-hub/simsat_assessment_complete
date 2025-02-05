<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../src/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../src/fonts/fonts.css">
    <link rel="stylesheet" href="../src/css/_utils.css">
    <link rel="stylesheet" href="src/css/login.css">
    <link rel="stylesheet" href="src/css/_sidebar_header.css">

    <title>Login</title>
</head>

<body>
    <div class="modal fade" id="result-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="course-head">Result</h1>
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
                                    <b>Total Questions:</b> <span id="result-total-questions"></span>
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
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid ">

        <div class="row flex-nowrap h-100">

            <div class=" sidebar pt-3 pb-2 d-flex flex-column justify-content-between">
                <div>
                    <a href="#" class="text-decoration-none logo-row row align-items-center justify-content-center gap-2">
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
                            <p class="mb-0">Muhammad Azam</p>
                        </div>
                    </div>
                    <hr class="border-2 border-white">

                    <div class="link-section  mb-1">
                        <div class="head d-flex justify-content-between cursor-pointer active">
                            <a href="#" class=" row mx-0 p-2 py-2 bg-transparent text-decoration-none">
                                <div class="left col-auto px-0">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>
                                <div class="right row col px-0 justify-content-between">
                                    <div class="col">
                                        <span class="ms-2">Announcements</span>
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
                                <a href="#" class="mx-0 col row mt-1 px-3 py-2 text-decoration-none">
                                    <div class="col-auto px-0">Web</div>
                                </a>
                                <a href="#" class="mx-0 col row mt-1 px-3 py-2 text-decoration-none">
                                    <div class="col-auto px-0">Graphics</div>
                                </a>
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

            <div class=" content bg-light">
                
                <header class="border-bottom  py-2" id="header">
                    <div class="row align-items-center justify-content-between position-relative">
                        <div class="col-auto ">
                            <i class="fa-solid fa-bars fs-5 cursor-pointer"></i>
                        </div>
                        <div class="col-auto row align-items-center ">
                            <div class="user-btn col-auto row column-gap-2 align-items-center px-3 mx-0 cursor-pointer">
                                <div class="col-auto px-0">
                                    <img 
                                    src="../src/img/user.png" 
                                    onerror="this.onerror=null;this.src='../src/img/user.png';"
                                    class=" rounded-circle user-pic" alt="User Pic">
                                </div>
                                <div class="col-auto px-0 d-sm-block d-none">
                                    <p class="m-0">Muhammad Azam</p>
                                </div>
                            </div>
                        </div>
                        <div class="user-dialog-box border border-2 border-dark-subtle rounded-3 px-0 shadow">
                            <div class="user-details py-3 rounded-top-3">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <img src="../src/img/user.png"
                                        onerror="this.onerror=null;this.src='../src/img/user.png';"
                                        class="rounded-circle " width="80px" height="80px" alt="User Pic">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <p class="my-0 text-center">
                                            Super Admin
                                        </p>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <p class="my-0 mt-1" style="font-size: 12px;">
                                            Admin Since 12 Jan, 2021
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="actions bg-light rounded-bottom-3">
                                <div class="row justify-content-center py-2">
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-outline-dark ">Sign out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- -------------------------------- Main Content Yield ---------------------------------- -->
                <!-- @yield('content') -->
                <section class="py-3 px-2">
                    <div class="row flex-column">
                        <div class="col">
                            <h4 class="fw-semibold">Results</h4>
                        </div>
                        <div class="col">
                            <div class="table-responsive">
                                <table id="result-table" class="table table-striped table-bordered table-hover border-dark-subtle">
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
                                        <tr data-student-id="1">
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
                                            <!-- <td>{!! date ('h:i a <b>||</b> d M, Y', strtotime($result->created_at)) !!}</td> -->
                                            <td>date</td>
                                        </tr>
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
<script src="../src/jquery/jquery.js"></script>
<script src="../src/bootstrap/js/bootstrap.min.js"></script>
<script src="../src/fontawesome/js/all.min.js"></script>

<script>
    $(document).ready(function() {
        // Add Course
        $('.modal form').submit(function(e) {
            e.preventDefault();
            
            // $('#course-modal').modal('show');
            if ($('#course-name').val() == "") {
                $('#course-name').addClass('is-invalid');
                $('#course-name').next().text('Course name is required');
            } else {
                $('#course-name').removeClass('is-invalid');
                $('#course-name').next().text('');
            }


            if ($('#questions-to-ask').val() == "") {
                $('#questions-to-ask').addClass('is-invalid');
                $('#questions-to-ask').next().text('Questions to ask is required');
            } else {
                $('#questions-to-ask').removeClass('is-invalid');
                $('#questions-to-ask').next().text('');
            }
            
        })
    
    })
</script>
</html>