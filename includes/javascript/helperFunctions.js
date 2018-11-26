function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

function resetBorderColor() {
    $('input').css('border-color', '#cccccc');
    $('select').css('border-color', '#cccccc');
}