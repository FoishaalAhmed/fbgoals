'use strict';

ClassicEditor
.create(document.querySelector('#editor'))
.catch(error => {
    console.error(error);
});