document.addEventListener("DOMContentLoaded", () => {

    // Ocultar/mostrar menu en versión movil
    document.getElementById('botonMenu').addEventListener('click', mostrarMenu);

});

// Ocultar/mostrar menu en versión movil
// lo hace dando uso a las clases css
function mostrarMenu() {
    let menu = document.getElementById('menu');

    if (menu.getAttribute('class') != 'flex') {
        menu.setAttribute('class', 'flex');
    } else {
        menu.setAttribute('class', 'hidden');
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