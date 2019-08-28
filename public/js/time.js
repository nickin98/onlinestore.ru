"use strict";

var radioTime = document.querySelector('#time2');

radioTime.addEventListener('change', showChoiceTime);

function showChoiceTime() {
    var select = document.createElement('select');
    var option = document.createElement('option');
    var date = new Date();
    var currentDay = date.getDate();
    var currentHours = date.getHours();
    var currentMinutes = roundUp(date.getMinutes());
    option.append(currentDay + ':' + currentHours ':' +)
    select.append()
    this.after();
}

function roundUp(number, precision) {
    return Math.ceil(number / precision) * precision;
}
