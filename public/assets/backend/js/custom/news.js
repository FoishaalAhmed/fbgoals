'use strict';

ClassicEditor
.create(document.querySelector('#editor'))
.catch(error => {
    console.error(error);
});

let teams = document.querySelector('input[name=tags]');
new Tagify(tags);

$(document).on('change','#news-photo-input', function() {
    readPicture(this, '#news-photo')
});