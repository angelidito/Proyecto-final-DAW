document.addEventListener("DOMContentLoaded", () => {

    // Ocultar/mostrar menu en versión movil
    document.getElementById('botonMenu').addEventListener('click', mostrarMenu);



    // Añadir enlaces de cada idioma    cambio de idioma.

    let enlacesCambioIdioma = document.getElementsByClassName('cambioIdioma');
    for (let i = 0; i < enlacesCambioIdioma.length; i++) {
        asignarEnlaceIdioma(enlacesCambioIdioma[i]);
    }

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

// function mostrarOcultarConFlex(e) {
//     let nivel = e.target.parentNode.getAttribute('class').split(' ')[1];
//     let div = document.getElementsByClassName(nivel)[1];
//     if (div.style.display != "flex") {
//         div.style.display = "flex";
//     } else {
//         div.style.display = "none";
//     }
// }

// Asigna el atributo href al enlace  
// correspondiente a la mísma página 
// pero en el otro idioma.
// Usa las clases de los elementos.
// La primera clase será el idioma:
//   · EN para cambiar a inglés
//   · ES para cambiar a español
// La segunda será cambioIdioma;
// para añadirles el evento de cambiar de idioma
function asignarEnlaceIdioma(enlace) {


    // Nuestra url actual
    let urlActual = window.location.href;

    // URL objetivo
    let urlObjetivo = '';

    // Idioma al que queremos cambiar
    let idiomaObjetivo = enlace.getAttribute('class').split(' ')[0].toLowerCase();

    // Buscamos cual es nuestro idioma actual:
    let idiomaActual = document.getElementsByTagName('html')[0].getAttribute('lang').toLowerCase();


    if (idiomaObjetivo == 'es') {
        enlace.innerHTML = 'ES'; // Cambiar esto por un icono
    } else if (idiomaObjetivo == 'en') {
        enlace.innerHTML = 'EN'; // Cambiar esto por un icono
    }



    // Si no estámos ya en la página del idioma...
    if (idiomaActual !== idiomaObjetivo) {

        // Contemplamos el caso excepcional de la página de inicio index.html en español 
        // donde no está escrito el idioma
        if (idiomaActual === 'es' && !/\/es\//.test(urlActual)) {
            // Le quitamos la parte de index.html por si por algun casual la tiene...
            // y le metemos en/   (sin la primera barra, porque no se la quitamos a la url actual)
            urlObjetivo = urlActual.split('index.html')[0] + 'en/';
        }

        // Si no es el caso excepcional, toca sustituir cosas
        else {
            // Dividimos el string por /es/ o /en/ segun corresponda
            let partesURL = urlActual.split('/' + idiomaActual + '/');
            // Creamos la nueva url con las partes del string anterior y metiendole /en/ o /es/ segun corresponda
            urlObjetivo = partesURL[0] + '/' + idiomaObjetivo + '/' + partesURL[1];
        }

        // console.log(
        //     "Idioma objetivo: " + idiomaObjetivo +
        //     '\n URL actual: ' + urlActual +
        //     '\n Idioma actual: ' + idiomaActual +
        //     '\n URL actual: ' + urlObjetivo);

        // Por ultimo vamos a la url del nuevo idioma.
        enlace.setAttribute('href', 'urlObjetivo');

    } else {
        console.log('Vaya, parece que alguien está intentando cambiar a un idioma en el que ya está la página...\nQue inista, que insista... La banderita no va moverse el sitio.');
        enlace.setAttribute('href', '#')
    }


    // NOTA: si aun no están creados los archivos de los otros idiomas, 
    // obviamente no va a encontrarlos, pero no es porblema, porque 
    // Tan y como funcióna ahora, llevará a los archivos correctos cuando estén

}