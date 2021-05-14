document.addEventListener("DOMContentLoaded", inicio);



/** 
 * Inicia diversos mecanismos necesarios para página. 
 */
function inicio() {


    // Ocultar/mostrar menu en versión movil
    let botonMenu = document.getElementById('botonMenu');
    if (botonMenu != null)
        botonMenu.addEventListener('click', mostrarMenu);

    // Enlaces
    asignarEnlaces();

    contador();

    hideVoidAlerts();

    checkUncheck();

    editContentAfter();
    if (document.getElementById('texto-crear-pagina') != null) {
        document.getElementById('page_name').addEventListener('input', editContentAfter);
    }


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
        }
        elseif(idiomaObjetivo == 'en') {
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

function contador() {
    (function($) {
        $.fn.countTo = function(options) {
            options = options || {};

            return $(this).each(function() {
                // set options for current element
                var settings = $.extend({}, $.fn.countTo.defaults, {
                    from: $(this).data('from'),
                    to: $(this).data('to'),
                    speed: $(this).data('speed'),
                    refreshInterval: $(this).data('refresh-interval'),
                    decimals: $(this).data('decimals')
                }, options);

                // how many times to update the value, and how much to increment the value on each update
                var loops = Math.ceil(settings.speed / settings.refreshInterval),
                    increment = (settings.to - settings.from) / loops;

                // references & variables that will change with each update
                var self = this,
                    $self = $(this),
                    loopCount = 0,
                    value = settings.from,
                    data = $self.data('countTo') || {};

                $self.data('countTo', data);

                // if an existing interval can be found, clear it first
                if (data.interval) {
                    clearInterval(data.interval);
                }
                data.interval = setInterval(updateTimer, settings.refreshInterval);

                // initialize the element with the starting value
                render(value);

                function updateTimer() {
                    value += increment;
                    loopCount++;

                    render(value);

                    if (typeof(settings.onUpdate) == 'function') {
                        settings.onUpdate.call(self, value);
                    }

                    if (loopCount >= loops) {
                        // remove the interval
                        $self.removeData('countTo');
                        clearInterval(data.interval);
                        value = settings.to;

                        if (typeof(settings.onComplete) == 'function') {
                            settings.onComplete.call(self, value);
                        }
                    }
                }

                function render(value) {
                    var formattedValue = settings.formatter.call(self, value, settings);
                    $self.html(formattedValue);
                }
            });
        };


        $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 100, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null // callback method for when the element finishes updating
        };


        function formatter(value, settings) {
            return value.toFixed(settings.decimals);
        }

    }(jQuery));



    jQuery(function($) {
        // custom formatting example
        $('.count-number').data('countToOptions', {
            formatter: function(value, options) {
                return value.toFixed(options.decimals).replace(
                    /\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
        });

        // start all the timers
        $('.timer').each(count);

        function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
        }
    });
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

    let textoCrearPagina = document.getElementById('texto-crear-pagina');
    if (textoCrearPagina != null) {
        let texto = document.getElementById('page_name').value + '.php';
        textoCrearPagina.setAttribute('data-content-after', texto);
    }

    // elemento.setAttribute('data-content-after', texto);
}