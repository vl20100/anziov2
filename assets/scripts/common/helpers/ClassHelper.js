var hasClass = function(element, className) {
    return new RegExp(' ' + className + ' ').test(' ' + element.className + ' ');
}

var addClass = function(element, className) {
    if (!hasClass(element, className)) {
        element.className += ' ' + className;
    }
}

var removeClass = function(element, className) {
    var newClass = ' ' + element.className.replace( /[\t\r\n]/g, ' ') + ' ';
    if (hasClass(element, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        element.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}

export { hasClass, addClass, removeClass };