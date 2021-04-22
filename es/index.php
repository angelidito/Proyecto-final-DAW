<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>


    <?php
    include('_partials/cabecera.html');
    ?>


    <nav id="migas" class="  ">
        <ul class="breadcrumb">
            <li>
                <a href="#">Inicio</a>
            </li>
        </ul>
    </nav>


    <main class="">



        <div id="tituloPagina" class="m-0 w-100">
            <div id="titulo-SEO-inicio" class="d-none" hidden>
                <h1>Inicio</h1>
            </div>

            <h2 class="tituloPagina">
                En TradúceMe
                <span id="ajusteTituloInicio"><br></span> te traducimos a ti
            </h2>

        </div>

        <div id="cuerpo-1" class="cuerpo">

            <div id="bloque-contador-recorrido" data-fuente="https://bootsnipp.com/snippets/4MByn" class="container text-center my-4">

                <script>
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
                </script>

                <h3>Mi recorrido</h3>

                <div class="row d-flex align-items-stretch ">
                    <div class="col-md-4 col-sm-12 my-1 ">
                        <div class="counter px-2 ">
                            <p id="traducciones-realizadas" class="heading timer count-title count-number" data-to=57 data-speed="2000"></p>
                            <p class="count-text ">Traducciones realizadas</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 my-1 ">
                        <div class="counter px-2 ">
                            <p id="palabras-traducidas" class="heading timer count-title count-number" data-to=55000 data-speed="2000">
                            </p>
                            <p class="count-text ">Palabras traducidas o editadas</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 my-1 ">
                        <div class="counter px-2 ">
                            <p id="clietes-satisfechos" class="heading timer count-title count-number" data-to=157 data-speed="2000"></p>
                            <p class="count-text ">Clientes satisfechos</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bloque-texto-inicio-1" class="container my-4 text-center">
                <h3 class="">Titulo del texto</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, facere! Quos commodi eveniet distinctio sequi deleniti totam natus quae perferendis delectus quisquam, impedit atque, in molestiae saepe consequatur fugit inventore? Lorem ipsum dolor sit
                    amet consectetur adipisicing elit. Hic earum asperiores voluptates inventore excepturi quaerat quasi ratione laboriosam, autem illo ea at totam magni labore eius quae? Ex, culpa sequi!
                </p>
            </div>

        </div>
        <hr>
        <div id="cuerpo-2" class="cuerpo">


            <div id="bloque-servicios-ofrecidos" class="container my-4 ">
                <h3 class="center">¿Qué servicios te ofrezco?</h3>
                <ul class="list-inline center ">

                    <li class="list-inline-item"><a href="#">Traducción Jurada</a></li>
                    <li class="list-inline-item"><a href="#">Traducción Jurídica</a></li>
                    <li class="list-inline-item"><a href="#">Traducción Económica</a></li>
                    <li class="list-inline-item"><a href="#">Traducción Técnica y Especializada</a></li>
                    <li class="list-inline-item"><a href="#">Traducción Audiovisual</a></li>
                    <li class="list-inline-item"><a href="#">Traducción de Páginas Web y Software</a></li>
                    <li class="list-inline-item"><a href="#">Revisión de traducciones de terceros</a></li>
                    <li class="list-inline-item"><a href="#">Corrección de textos</a></li>
                    <li class="list-inline-item"><a href="#">Transcripción y subtitulación</a></li>
                    <li class="list-inline-item"><a href="#">Creación de bases terminológicas</a></li>
                    <li class="list-inline-item"><a href="#">Creación de memorias de traducción</a></li>
                    <li class="list-inline-item"><a href="#">Asesoramiento lingüistico</a></li>

                </ul>
            </div>

            <div id="bloque-opiniones" class="container my-4 text-center carousel slide">

                <h3>Opiniones</h3>

                <div id="opiniones" class=" container-fluid carousel-inner px-4" data-ride="carousel">

                    <div class="comilla-ini "></div>
                    <div class="comilla-fin "></div>

                    <div class="carousel-item ">
                        <p class="opinion">
                            <q>
                                Me ha traducido los textos de mi página web. Entiendo bien el inglés y los veo
                                muy acertados.
                            </q>
                            <span class="autor-cita">Ángel Mori Martínez</span>
                        </p>
                    </div>

                    <div class="carousel-item active">
                        <p class="opinion">
                            <q>
                                Malena ha superado mis expectativas. Realmente he quedado satisfecho con su
                                trabajo, mis clientes del mercado internacional lo agradecerán sin duda.
                            </q>
                            <span class="autor-cita">Marta Gallardo</span>
                        </p>
                    </div>

                    <div class="carousel-item">
                        <p class="opinion">
                            <q>
                                Muchas gracias por la revisión de mi documento!
                            </q>
                            <span class="autor-cita">Ricardo Soler</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include('_partials/pie.html');
    ?>