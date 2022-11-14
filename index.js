function DarkMode() {
    var body = document.body;
    var botao = document.getElementById("botao");

    if(body.classList.toggle("dark")) {
        botao.innerHTML = "Light Mode";
        botao.style.backgroundColor = "#fff";
        botao.style.color = "#000";
    } else {
        botao.innerHTML = "Dark Mode";
        botao.style.backgroundColor = "#000";
        botao.style.color = "#fff";
    }
}

