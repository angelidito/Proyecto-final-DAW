document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('botonMenu').addEventListener('click', mostrarMenu);

});

function mostrarMenu() {
    let menu = document.getElementById('menu');

    if (menu.style.display != "flex") {
        menu.style.display = "flex";
    } else {
        menu.style.display = "none";
    }
}

// function mostrarOcultar(e) {
//     let nivel = e.target.parentNode.getAttribute('class').split(' ')[1];
//     let div = document.getElementsByClassName(nivel)[1];
//     if (div.style.display != "flex") {
//         div.style.display = "flex";
//     } else {
//         div.style.display = "none";
//     }
// }