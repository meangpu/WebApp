var textDate = Date()

// store date in varible name "textDate"

var button = document.getElementById("button")
var textDisplay = document.getElementById("display")

button.addEventListener("click", function() {
    textToTime(textDisplay)
})

// cannot use ("click", textToTime(textDisplay)) it will not run properly
// When passing parameter values, use an "anonymous function" that calls the specified function with the parameters:

function textToTime(input) {
    input.textContent = textDate
}