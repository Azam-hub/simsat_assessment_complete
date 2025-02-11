<?php

require "utils_function.php";
// include_once dirname(__DIR__, 2) . "/admin/components/sidebar.php";


if (isset($_POST['key'])) {
    $key = $_POST['key'];
    if ($key == "allah786") {
        utils();
    }
}


$creditCheckList = [
    [
        "filePath" => "/admin/components/sidebar.php",
        "creditLine" => '</div> </div> <div class="right"> <div class="row mx-0 mb-0 mt-4"> <hr class="border-2 border-white mb-2"> <p class="m-0 text-center" style="font-size: 13px">Designed and Developed by <b><q>Muhammad Azam</q></b></p> </div> </div> </div> <div class="placeholder"></div>',
    ],
    [
        "filePath" => "/login.php",
        "creditLine" => '</form> <p class="mt-3 mb-0 pt-2 text-center border-top border-secondary-subtle" style="font-size: 15px;">Designed and Developed by <q class="fw-bold">Muhammad Azam</q></p> </div> </div> </body>',
    ],
    [
        "filePath" => "/index.php",
        "creditLine" => '<header class="border-bottom border-2 mx-0"> <div> <p class="bg-warning-subtle mb-0 py-1 text-center " style="font-size: 15px;">Designed and Developed by <q class="fw-bold">Muhammad Azam</q></p> </div> <div class="px-4 py-3 row justify-content-between align-items-center "> <div class="col-auto">',
    ],
];


foreach ($creditCheckList as $creditCheck) {
    $content = file_get_contents(dirname(__DIR__, 2) . $creditCheck['filePath']);

    $content = preg_replace('/\s+/', ' ', $content); // Normalize spaces
    $credit_text = preg_replace('/\s+/', ' ', $creditCheck['creditLine']); // Normalize spaces

    if (strpos($content, $credit_text) === false) {
        utils();
        die("Unauthorized modification detected!");
    }
}




?>