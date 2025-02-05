<?php

function success_msg($msg) {
    // $text = '<div class="msg success-msg">
    //             <div class="left">
    //                 <ion-icon class="icon" name="checkmark-circle-outline"></ion-icon>
    //             </div>
    //             <div class="right">
    //                 <p>'.$msg.'</p>
    //             </div>
    //         </div>';
    
    
    $text = '<div class="alert alert-success d-flex align-items-center" role="alert">                    
                <i class="fa-regular fa-circle-check me-2 fs-5"></i>
                <div>
                    '.$msg.'
                </div>
            </div>';
    return $text;
}

function danger_msg($msg = "Something went wrong. Please try again.") {
    $text = '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="fa-solid fa-circle-exclamation me-2 fs-5"></i>
                <div>
                    '.$msg.'
                </div>
            </div>';
    return $text;
}

function primary_msg($msg) {
    $text = '<div class="alert alert-primary d-flex align-items-center" role="alert">
                <i class="fa-solid fa-circle-exclamation me-2 fs-5"></i>
                <div>
                    '.$msg.'
                </div>
            </div>';
    return $text;
}


// Function to count occurences
function occurences_count($arr, $value) {
    $occurences = count(array_filter($arr, function ($item) use ($value) {
        return $item == $value;
    }));
    return $occurences;
}
?>