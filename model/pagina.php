<?php

require './db/traduceme_content/conexion.php';
require 'form_control.php';

class Pagina
{
    protected $page_name;
    protected $lang;
    protected $title;
    protected $content;

    /**
     * Crea un objeto Pagina o lanza una excepción.
     *
     * @param string $_page_name
     * @param string $_lang
     * @param string $_title
     * @param string $_content
     * 
     */
    public function __construct($_page_name, $_lang, $_title, $_content)
    {
        $this->page_name = $_page_name;
        $this->lang = $_lang;
        $this->title = $_title;
        $this->content = $_content;
    }

    public function getPage_name()
    {
        return $this->page_name;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }


    /**
     * Lanza una excepción si no es válido el objeto para la base de datos.
     *
     * @throws FormException Cuando los atributos del objeto no son no tienen el tamaño que deben tener.
     * 
     * @return void
     */
    private function validarPagina()
    {
        FormControl::checkLength($this->page_name, 5, 40);
        FormControl::checkLang($this->lang);
        FormControl::checkLength($this->title, 5, 70);
        FormControl::checkLength($this->content, 13, 65535);
    }

    /**
     * Crea a partir de si misma, un registro en la base de datos en la tabla tm_page.
     *
     * @throws FormException Cuando los atributos del objeto no son no tienen el tamaño que deben tener.
     * 
     * @return boolean `true` si se ha añadido, `false` si no.
     */
    public function crear()
    {
        $this->validarPagina();

        $conn = new Consulta();

        return $conn->añadirPagina($this);
    }


    /**
     * Undocumented function
     *
     * @param string $controllersRel Ucación donde estará disponible la página.
     * @return void
     */
    public function habilitar($path)
    {
        $file = fopen("$path/$this->page_name.php", "w");
        fwrite(
            $file,
            "<?php"
                . PHP_EOL . "\$page_name = '$this->page_name';"
                . PHP_EOL . "require 'start.php';"
        );
        fclose($file);
    }

    /**
     * Devuelve los datos del objeto como un array
     *
     * @return array Array de datos del objeto.
     */
    public function toArray($associative = false)
    {
        if ($associative)
            return array('page_name' => $this->page_name, 'lang' => $this->lang, 'title' => $this->title, 'content' => $this->content);

        return array($this->page_name, $this->lang,  $this->title, $this->content);
    }
}
