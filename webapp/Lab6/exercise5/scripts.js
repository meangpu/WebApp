var nameError = "The name must be fewer than 10 characters"
var ageError = "The age must be a number between 1 and 100"
var mailError = "Not a valid e-mail!"

function checkAll(name, age, mail) {
    if (name.length > 10) {
        alert(nameError)
    }

    if (age <= 0 || age > 100) {
        alert(ageError)
    }

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {} else {
        alert(mailError)
    }

}