<?php

require_once 'form_control.php';
require_once 'db/traduceme_content/conexion.php';

class Pagina
{
    protected $page_name;
    protected $lang;
    protected $title;
    protected $content;
    public static $conn;

    /**
     * Crea un objeto Pagina.
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
        if (!isset(self::$conn))
            self::$conn = new Consulta();
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
     * Devuelve el idioma.
     * 
     * Español o inglés si el contenido de `$lang` es 'es' o 'en, respectivamente.
     * En caso de que no sea ninguno, devuelve el contenido de esta variable.
     *
     * @return string El idioma de la página.
     */
    public function getIdioma()
    {
        if ($this->lang == 'es')
            return 'español';
        else if ($this->lang == 'en')
            return 'inglés';
        else
            return $this->lang;
    }

    /**
     * TODO.
     *
     * Crea un array de objetos `Pagina` con cada una las páginas existentes de la web.
     *
     * Genera y devuelve un array de objetos `Pagina` a parir de cada uno
     * de los registros de la tabla tm_page.
     *
     * @return array Array con los registros de la tabla tm_page qeu coincidan.
     *
     */
    public static function getPaginas()
    {
        throw new Exception("TODO: <pre>Pagina::getPaginas()</pre>", 1);

        $filas = self::$conn->getPaginas();

        $paginas = array();

        foreach ($filas as $fila) {
            // $paginas[$fila] =
        }
    }


    /**
     * Lanza una excepción si alguno de los parámetros del objeto no es válido para la base de datos.
     * 
     * @param boolean $_page_name Si se quiere validar o no.
     * @param boolean $_lang Si se quiere validar o no.
     * @param boolean $_title Si se quiere validar o no.
     * @param boolean $_content Si se quiere validar o no.
     * @return void
     * @throws FormException Cuando alguno de los atributos del objeto no son validos.
     */

    protected function validarPagina($_page_name = true, $_lang = true, $_title = true, $_content = true)
    {
        FormControl::checkPage_Name($_page_name);
        if ($_page_name)
            FormControl::checkLength($this->page_name, 5, 40, 'nombre de la página');
        if ($_lang)
            FormControl::checkLang($this->lang);
        if ($_title)
            FormControl::checkLength($this->title, 5, 70, 'título navegador');
        if ($_content)
            FormControl::checkLength($this->content, 13, 65535, 'contenido');
    }

    /**
     * Crea a partir de si misma, un registro en la base de datos en la tabla tm_page.
     *
     * @return boolean `true` si se ha añadido, `false` si no.
     * @throws FormException Cuando los atributos del objeto no son no tienen el tamaño que deben tener.
     */
    public function crear()
    {
        $this->validarPagina();

        return self::$conn->añadirPagina($this);
    }

    /**
     * Actualiza un registro en la base de datos en la tabla tm_page.
     * 
     * El registro que se modificará será aquel que coincidan los atributos 
     * del objeto $page_name y $lang con la clave primaria (page_name, lang).
     * 
     * Si se omiten los parámetros, se actualizará con el contenido de los atributos del objeto.
     * 
     * @param string $_title Título de la página en la pestaña del navegador.
     * @param string $_content Contenido HTML de la página.
     * @return boolean `true` si se ha añadido, `false` si no.
     * @throws FormException Cuando los atributos del objeto no son no tienen el tamaño que deben tener.
     */
    public function actualizar($_title = null, $_content = null)
    {
        if ($_title != null)
            $this->title = $_title;
        if ($_content != null)
            $this->content = $_content;

        $this->validarPagina();

        return self::$conn->actualizarPagina($this);
    }


    /**
     * Undocumented function
     *
     * @param string $controllersRel Ubicación donde estará disponible la página.
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
     * Devuelve array con los atributos del objeto.
     *
     * Los atributos son, en orden: page_name, lang, title y content.
     *
     *@param boolean $associative Si se omite o es `false`, devuelve array no asociativo.
     *                            Si es `true`, lo de vuelve asociativo.
     * @return array Array de datos del objeto.
     */
    public function toArray($associative = false)
    {
        if (!$associative) {
            return array($this->page_name, $this->lang,  $this->title, $this->content);
        }

        return array('page_name' => $this->page_name, 'lang' => $this->lang, 'title' => $this->title, 'content' => $this->content);
    }
}
