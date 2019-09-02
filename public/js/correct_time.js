"use strict";

function futureTime(date) {
    var inputTime = document.querySelector('#time');

    var now = new Date();

    now.setHours(0,0,0,0);
    var arrayDate = date.split('.');
    var date = new Date(arrayDate[2], arrayDate[1] - 1, arrayDate[0]);

    if (date.getTime() > now.getTime()) {
        inputTime.innerHTML = '<option>10:00</option>' +
            '<option>11:00</option>' +
            '<option>12:00</option>' +
            '<option>13:00</option>' +
            '<option>14:00</option>' +
            '<option>15:00</option>' +
            '<option>16:00</option>' +
            '<option>17:00</option>' +
            '<option>18:00</option>' +
            '<option>19:00</option>' +
            '<option>20:00</option>';
    } else if (date.getTime() == now.getTime()) {
        var hour = new Date().getHours();
        if (hour < 9) {
            hour = 9;
        }

        while(hour < 20) {
            hour++;
            var option = document.createElement('option');
            if (hour < 10) {
                option.innerHTML = '0' + hour + ':00';
            } else {
                option.innerHTML = hour + ':00';
            }
            inputTime.append(option);
        }
    }
}