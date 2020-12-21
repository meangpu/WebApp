var number = 0;


function update() {
    var numLine = document.getElementById("result")
    number += 1;

    numLine.textContent = "You clicked the button for " + number;
    if (number <= 1) {
        numLine.textContent += " time";
    } else {
        numLine.textContent += " times";
    }

}

var buttons = document.querySelectorAll('button');
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', update);
}