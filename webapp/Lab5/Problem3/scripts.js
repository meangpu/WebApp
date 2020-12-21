var ThaiAdd = [" เป็นคนใจดี", " หน้าตาดี", " มีความสุข", " มีสุขภาพแข็งแรง"]
var EngAdd = [" is good looking", " have a happy life", " have a lot of money", " is healty", " have a beautiful wife"]

var submitButton = document.getElementById("submitbt")
var final = document.getElementById("final")


submitButton.addEventListener("click", run)

function run() {
    var username = document.getElementById("username").value

    //// to get valur drom radio button 
    var ele = document.getElementsByName('lang');

    for (i = 0; i < ele.length; i++) {
        if (ele[i].checked) {
            select = ele[i].value;
        }
    }


    /// value from radio button store in select which is "th" or "eng"

    if (select == "th") {

        ThItem = ThaiAdd[Math.floor(Math.random() * ThaiAdd.length)];
        final.textContent = username + ThItem;
        final.style.backgroundColor = "yellow"


    } else if (select == "eng") {

        EngItem = EngAdd[Math.floor(Math.random() * EngAdd.length)];
        final.textContent = username + EngItem;
        final.style.backgroundColor = "yellow"
    } else {
        final.textContent = "Error"
        final.style.backgroundColor = "red"
    }




}