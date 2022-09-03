var para = document.querySelector("p");

para.addEventListener("click", updatename);

function updatename() {
    var name = prompt("Enter a new name");
    para.textContent = "Player 1 : " + name;
}