document.addEventListener("DOMContentLoaded", inicio);

/** 
 * Inicia diversos mecanismos necesarios para página. 
 */
function inicio() {

    // Ocultar/mostrar menu en versión movil
    document.getElementById('botonMenu').addEventListener('click', mostrarMenu);

    // Enlaces
    asignarEnlaces();
}


/**
 * Oculta o muestra el menú en versión movil.
 * 
 * Emplea clases css.
 */
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


function asignarEnlaces() {

    // Añadir enlaces de cada idioma    cambio de idioma.
    let enlacesCambioIdioma = document.getElementsByClassName('cambioIdioma');
    for (let i = 0; i < enlacesCambioIdioma.length; i++) {
        asignarEnlaceIdioma(enlacesCambioIdioma[i]);
    }

    asignarEnlaceAClase('google.es', 'telefono');
    asignarEnlaceAClase('mailto:malena.traduceme@gmail.com', 'email');

}

/** 
 * Asigna el atributo href al enlace
 * correspondiente a la mísma página
 * pero en el otro idioma.
 * Usa las clases de los elementos.
 * 
 * La primera clase será el idioma:  
 *  · EN para cambiar a inglés;  
 *  · ES para cambiar a español.
 * 
 * La segunda será cambioIdioma: 
 * para añadirles el evento de cambiar de idioma
 * 
 * @param {Element} enlace Elemento `a` que debe cambiar de idioma
 * 
 */
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
        enlace.innerHTML = 'ES'; // TODO: Cambiar esto por un icono
    } else if (idiomaObjetivo == 'en') {
        enlace.innerHTML = 'EN'; // TODO: Cambiar esto por un icono
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
        enlace.setAttribute('href', urlObjetivo);

    } else {
        enlace.setAttribute('href', '#')
    }

    // NOTA: si aun no están creados los archivos de los otros idiomas, 
    // obviamente no va a encontrarlos, pero no es porblema, porque 
    // Tan y como funcióna ahora, llevará a los archivos correctos cuando estén
}


/**
 * Asigna el un string como atributo `href` 
 * a los elementos `a` de una clase concreta.
 * 
 * Si algún elemento tiene la clase especificada, 
 * pero no es un elace, no le asigna el atributo `href`.
 * 
 * @param {string} enlace Enlace poner como `href` 
 * @param {string} clase Atributo `class` del elemento
 */
function asignarEnlaceAClase(enlace, clase) {

    const elementos = document.getElementsByClassName(clase);

    for (let i = 0; i < elementos.length; i++) {
        const element = elementos[i];

        if (element.tagName == 'A') {
            element.setAttribute('href', enlace);
        }

    }
}