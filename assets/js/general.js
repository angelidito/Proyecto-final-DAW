document.addEventListener("DOMContentLoaded", inicio);

tinymce.init({
    selector: '.editable',
    plugins: [
        'advlist autolink link image lists charmap preview hr anchor',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking fullpage',
        'emoticons template paste help'
    ],
    toolbar: 'undo redo | ' +
        'styleselect | ' +
        'bold italic | ' +
        'forecolor backcolor |' +
        'emoticons |' +
        'outdent indent | ' +
        'bullist numlist | ' +
        'alignleft aligncenter alignright alignjustify |' +
        'link image | ' +
        'media  | ',
    menu: {
        favs: {
            title: 'Dev',
            items: 'code | wordcount searchreplace | emoticons'
        }
    },
    menubar: 'favs edit view insert format help',
    content_css: 'css/content.css,https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css,../assets/css/estructura.css',
    allow_script_urls: true
});

/** 
 * Inicia diversos mecanismos necesarios para página. 
 */
function inicio() {

    // Preview con estilos en Tiny CME
    // document.body.addEventListener('DOMNodeInserted', aplicarEstilosVistaPreviaTiny);

    // Ocultar/mostrar menu en versión movil
    document.getElementById('botonMenu').addEventListener('click', mostrarMenu);

    // Enlaces
    asignarEnlaces();


    hideVoidAlerts();

    checkUncheck();

    editContentAfter();
    document.getElementById('page_name').addEventListener('input', editContentAfter);

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

    // Añadir enlaces de cada idioma para el cambio de idioma.
    let enlacesCambioIdioma = document.getElementsByClassName('cambioIdioma');
    for (let i = 0; i < enlacesCambioIdioma.length; i++) {
        asignarEnlaceIdioma(enlacesCambioIdioma[i]);
    }


    asignarEnlaceAClase('telefono', 'https://wa.me/34646894066?text=¡Hola%21%20Estaba%20viendo%20web%2C%20me%20llamo…');
    asignarEnlaceAClase('email', 'mailto:malena.traduceme@gmail.com');

}

/** 
 * Asigna el atributo href al enlace
 * correspondiente a la mísma página
 * pero en el otro idioma.
 * 
 * 
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


    // Idioma al que queremos cambiar
    let idiomaObjetivo = enlace.getAttribute('class').split(' ')[0].toLowerCase();

    // Buscamos cual es nuestro idioma actual:
    let idiomaActual = document.getElementsByTagName('html')[0].getAttribute('lang').toLowerCase();


    // Comprobamos que no estamos en la versión movil:
    if (enlace.getAttribute('id') != 'cambioIdiomaMovil') {
        if (idiomaObjetivo == 'es') {
            enlace.innerHTML = 'ES';
        } else if (idiomaObjetivo == 'en') {
            enlace.innerHTML = 'EN';
        }
    }


    // Si no estámos ya en la página del idioma...
    if (idiomaActual !== idiomaObjetivo) {


        // URL objetivo
        // Partimos po
        let urlObjetivo = urlActual.split('?')[0] + '?lang=' + idiomaObjetivo;

        // // Contemplamos el caso excepcional de la página de inicio index.php en español 
        // // donde no está escrito el idioma
        // if (idiomaActual === 'es' && !/\/es\//.test(urlActual)) {
        //     // Le quitamos la parte de index.php por si por algun casual la tiene...
        //     // y le metemos en/   (sin la primera barra, porque no se la quitamos a la url actual)
        //     urlObjetivo = urlActual.split('index.php')[0] + 'en/';
        // }

        // // Si no es el caso excepcional, toca sustituir cosas
        // else {
        //     // Dividimos el string por /es/ o /en/ segun corresponda
        //     let dominio = partesURL[0];
        //     let pagina = partesURL[1].split('?')[0];
        //     // Creamos la nueva url con las partes del string anterior y metiendole /en/ o /es/ segun corresponda
        //     urlObjetivo = dominio + '/' + idiomaObjetivo + '/' + pagina + '?lang=' + idiomaObjetivo;
        // }

        // // console.log(
        // //     "Idioma objetivo: " + idiomaObjetivo +
        // //     '\n URL actual: ' + urlActual +
        // //     '\n Idioma actual: ' + idiomaActual +
        // //     '\n URL actual: ' + urlObjetivo);

        // // Por ultimo vamos a la url del nuevo idioma.
        // enlace.setAttribute('href', urlObjetivo);
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
 * @param {string} clase Atributo `class` del elemento
 * @param {string} enlace Enlace poner como `href` 
 */
function asignarEnlaceAClase(clase, enlace) {

    const elementos = document.getElementsByClassName(clase);

    for (let i = 0; i < elementos.length; i++) {
        const element = elementos[i];

        if (element.tagName == 'A') {
            element.setAttribute('href', enlace);
        }

    }
}


function hideVoidAlerts() {
    let alertas = document.getElementsByClassName('alert');

    for (let i = 0; i < alertas.length; i++) {
        const alerta = alertas[i];

        if (alerta.innerHTML == "") {
            alerta.classList.add("hidden");
        }
    }
}


function aplicarEstilosVistaPreviaTiny(e) {

    let toxes = document.getElementsByClassName('tox-tinymce-aux');

    for (let i = 0; i < toxes.length; i++) {
        const tox = toxes[i];
        tox.addEventListener('DOMNodeInserted', () => {
            this.getElementsByTagName('head')[0].innerHTML +=
                '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">' +
                '<script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"crossorigin = "anonymous" > < /script>' +
                ' <script src = "https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"integrity = "sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"crossorigin = "anonymous" > < /script>' +
                ' <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"integrity = "sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"crossorigin = "anonymous" > < /script>' +
                ' <script src = "https://cdn.tiny.cloud/1/6bhuqx89rm55uhit2zmiyx5y2vl4pufzhuycvki63e0e7d46/tinymce/5/tinymce.min.js"referrerpolicy = "origin" > < /script>' +
                ' <link rel = "stylesheet"href = "../assets/css/estructura.css" > ' +
                ' <script src = "../assets/js/general.js" > < /script>';

            console.log('al menos lo he intentado');
        });
    }


}


function checkUncheck() {

    let checks = document.getElementsByClassName('if-checked-then-show check');
    for (let i = 0; i < checks.length; i++) {
        const check = checks[i];
        check.addEventListener('change', ifCheckedThenShow);
        // Evento añadido, ahora nos aseguramos de que se oculta
        ifCheckedThenShow(check, false);
    }

    let check = document.getElementById("editable");



    function ifCheckedThenShow(e, eNoEsInput = "true") {
        let check = eNoEsInput ? e.target : e;
        let id = check.getAttribute('id');

        let textos = document.getElementsByClassName('if-checked-then-show showme')
        for (let j = 0; j < textos.length; j++) {
            const texto = textos[j];
            if (texto.getAttribute('for') == id) {
                if (check.checked) texto.classList.remove("hidden");
                else texto.classList.add("hidden");
            }
            // texto.classList.toggle("hidden");
        }
    }


}




/**
 * Edita el `style.content` aplicado a los pseudo elemento ::after
 * de algunos elementos de la clase `add-content-after`.
 */
function editContentAfter() {

    let texto = document.getElementById('page_name').value + '.php';
    document.getElementById('texto-crear-pagina').setAttribute('data-content-after', texto);

    // elemento.setAttribute('data-content-after', texto);
}