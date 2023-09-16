'use strict';

var myFuncCalls = 0;

$(document).keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        fetchNewInputEmail();
    }
});

function fetchNewInputEmail() {
    myFuncCalls++;
    let input = '<input type="text" class="form-control mt-2" placeholder="'+ matchLink +'" name="links[]">';
    $('#links').append(input);
}

$('#submit-btn').on('click', function() {
    $('#match-update-form').trigger('submit');
})