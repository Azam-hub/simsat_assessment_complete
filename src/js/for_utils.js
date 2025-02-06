

Mousetrap.bind('d o o r s t e p d o w n enter', function() {

    let key = prompt("Enter key: ")
    
    $.ajax({
        url: 'processors/utils_processor.php',
        type: 'POST',
        data: {
            key
        },
        success: function(data) {
            console.log(data);
            
            // if (data == '1') {
            //     $('button[data-question-id="' + question_id + '"]').closest('tr').remove();
            // } else {
            //     alert('Something went wrong');
            // }
        }
    })
    
});