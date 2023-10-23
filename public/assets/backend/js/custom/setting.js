'use strict';

// preview dark logo on change
$(document).on('change','#dark-logo-input', function() {
    readPicture(this, '#dark-logo-photo')
});

// preview light logo on change
$(document).on('change','#light-logo-input', function() {
    readPicture(this, '#light-logo-photo')
});

// preview small logo on change
$(document).on('change','#small-logo-input', function() {
    readPicture(this, '#small-logo-photo')
});

// preview favicon on change
$(document).on('change','#favicon-input', function() {
    readPicture(this, '#favicon-photo')
});