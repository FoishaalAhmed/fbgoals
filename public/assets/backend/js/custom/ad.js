'use strict';

 function addHelpText(position) {
    let helpText;

    switch (position) {
        case 'top':
            helpText = topMsg;
            break;
        case 'bottom':
            helpText = bottomMsg;
            break;
        case 'sidebar 1':
        case 'sidebar 2':
            helpText = sidebarMsg;
            break;
        case 'sticky':
            helpText = stickyMsg;
            break;
        default:
            helpText = '';
            break;
    }

    $('#ad-help-text').text(helpText);
};

$(document).ready(function() {
    addHelpText(position);
});