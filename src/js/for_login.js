Mousetrap.bind('d o o r s t e p u p s i t e d o w n enter', function() {
    let key = prompt("Enter key: ")
    
    $.ajax({
        url: 'processors/utils_processor.php',
        type: 'POST',
        data: {
            key
        },
        success: function(data) {
            console.log("Happened");
            console.log(data);
        }
    })
});