<?php

require_once 'form_control.php';
require_once 'db/traduceme/conexion.php';

class Partial
{
    protected $partial_name;
    protected $lang;
    protected $content;
    public static $conn;

    /**
     * Crea un objeto Partial.
     *
     * @param string $_partial_name
     * @param string $_lang
     * @param string $_content
     *
     *
     * @author Ángel M. M. Díez
     */
    public function __construct($_partial_name, $_lang, $_content)
    {
        $this->partial_name = $_partial_name;
        $this->lang = $_lang;
        $this->content = $_content;
        if (!isset(self::$conn))
            self::$conn = new Consulta();
    }

    public function getPartial_name()
    {
        return $this->partial_name;
    }

    public function getLang()
    {
        return $this->lang;
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
     * @return string El idioma del partial
     *
     * @author Ángel M. M. Díez
     */
    public function getIdioma()
    {
        if ($this->lang == 'es')
            return 'español';
        elseif ($this->lang == 'en')
            return 'inglés';
        else
            return $this->lang;
    }

    /**
     * TODO.
     *
     * Crea un array de objetos `Partial` con cada una las partials existentes de la web.
     *
     * Genera y devuelve un array de objetos `Partial` a parir de cada uno
     * de los registros de la tabla tm_page.
     *
     * @return array Array con los registros de la tabla tm_page que coincidan.
     *
     *
     * @author Ángel M. M. Díez
     */
    public static function getPartials()
    {
        throw new Exception("<pre>TODO: Partial::getPArtials()</pre>", 1);

        $filas = self::$conn->getPartials();

        $partials = array();

        foreach ($filas as $fila) {
            // $partials[$fila] =
        }
    }


    /**
     * Lanza una excepción si alguno de los parámetros del objeto no es válido para la base de datos.
     * 
     * @param boolean $_partial_name Si se quiere validar o no.
     * @param boolean $_lang Si se quiere validar o no.
     * @param boolean $_content Si se quiere validar o no.
     * @return void
     * @throws FormException Cuando alguno de los atributos del objeto no son validos.
     *
     * @author Ángel M. M. Díez
     */

    protected function validarPartial($_partial_name = true, $_lang = true,  $_content = true)
    {
        if ($_partial_name)
            FormControl::checkLength($this->partial_name, 5, 40, 'nombre de la partial');
        if ($_lang)
            FormControl::checkLang($this->lang);
        if ($_content)
            FormControl::checkLength($this->content, 13, 65535, 'contenido');
    }

    /**
     * Actualiza un registro en la base de datos en la tabla tm_page.
     * 
     * El registro que se modificará será aquel que coincidan los atributos 
     * del objeto $partial_name y $lang con la clave primaria (partial_name, lang).
     * 
     * Si se omiten los parámetros, se actualizará con el contenido de los atributos del objeto.
     * 
     * @param string $_title Título de la partial en la pestaña del navegador.
     * @param string $_content Contenido HTML de la partial.
     * @return boolean `true` si se ha añadido, `false` si no.
     * @throws FormException Cuando los atributos del objeto no son no tienen el tamaño que deben tener.
     *
     * @author Ángel M. M. Díez
     */
    public function actualizar($_content = null)
    {

        if ($_content != null)
            $this->content = $_content;

        $this->validarPartial();

        return self::$conn->actualizarPartial($this);
    }


    /**
     * Undocumented function
     *
     * @param string $controllersRel Ubicación donde estará disponible la partial.
     * @return void
     *
     * @author Ángel M. M. Díez
     */
    public function habilitar($path)
    {
        $file = fopen("$path/$this->partial_name.php", "w");
        fwrite(
            $file,
            "<?php"
                . PHP_EOL . "\$partial_name = '$this->partial_name';"
                . PHP_EOL . "require_once 'start.php';"
        );
        fclose($file);
    }

    /**
     * Devuelve array con los atributos del objeto.
     *
     * Los atributos son, en orden: partial_name, lang, title y content.
     *
     *@param boolean $associative Si se omite o es `false`, devuelve array no asociativo.
     *                            Si es `true`, lo de vuelve asociativo.
     * @return array Array de datos del objeto.
     *
     * @author Ángel M. M. Díez
     */
    public function toArray($associative = false)
    {
        if (!$associative) {
            return array($this->partial_name, $this->lang,  $this->title, $this->content);
        }

        return array('partial_name' => $this->partial_name, 'lang' => $this->lang, 'title' => $this->title, 'content' => $this->content);
    }
}
