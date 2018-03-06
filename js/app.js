'use strict';

function sumar() {
    return Array.from(arguments).reduce(function (a, n) {
        return a + n;
    }, 0);
}

var s = sumar(5, 6, 4);
console.log('CustomJS', s);