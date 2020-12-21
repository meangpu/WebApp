var person = { firstname: "Manee", lastname: "Doe", country: "Thailand", age: 50 };
var word = document.getElementById("answer");

word.textContent += person.firstname + " is " + person.age + " years old.";