<?php

require 'datos_config.php';


/**
 * Clase con conexión a la BD tm_page.
 *
 * @param mysqli $conn
 *
 * @author Ángel M. M. Díez
 */
class Conexion
{
    // Conexión objeto de tipo mysqli
    protected $conn;

    /**
     * Constructor de la clase.
     *
     * Establece una conexión con la BD perros_raza según la configuración del archivo datos_config.php.
     *
     *
     * @author Ángel M. M. Díez
     */
    public function __construct()
    {
        // Damos valor al link
        $this->conn = new mysqli(BD_HOST, BD_USER, BD_PW, BD_NAME);

        // Comprobamos la conexión
        if ($this->conn->connect_errno) {
            echo "Fallo en la conexión...<br>";
        }
        // else {
        //     echo "Consexión establecida.<br>";
        // }

        // Asigna el charset
        $this->conn->set_charset(BD_CHARSET);
    }
}

/**
 * Clase para realizar consultas en la BD tm_content.
 *
 * Contiene multitud de métodos.
 *
 *
 * @author Ángel M. M. Díez
 */
class Consulta extends Conexion
{
    /**
     * Constructor de la clase.
     *
     * Establece una conexión con la BD perro_raza.
     *
     * @author Ángel M. M. Díez
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Comprueba si se han visto afectada alguna fila con la última operacion en la BD.
     *
     * @return boolean `true` si se han visto afectadas filas de la BD; `false` si no.
     *
     * @author Ángel M. M. Díez
     */
    private function anyRowAffected()
    {
        if ($this->conn->affected_rows < 1)
            return false;
        return true;
    }

    /**
     * Añade una página a la base de datos.
     *
     * @param Pagina $pagina Página a añadir.
     *
     * @return boolean `true` si la página se ha añadido a la base de datos. `false` si no.
     *
     * @author Ángel M. M. Díez
     */
    public function añadirPagina($pagina)
    {
        $datos = $pagina->toArray(false);

        $insert =
            "INSERT INTO
                tm_page (page_name, lang, title, content)
            VALUES
                ('$datos[0]', '$datos[1]', '$datos[2]', '" . addslashes($datos[3]) . "');";


        $this->conn->query($insert);


        return $this->anyRowAffected();
    }

    /**
     * Actualiza información de un registro la tabla tm_page.
     * 
     * @param Pagina $pagina Página a actualizar.
     * @return boolean `true` si se ha añadido, `false` si no.
     *
     * @author Ángel M. M. Díez
     */
    public function actualizarPagina($pagina)
    {
        $select =
            "UPDATE tm_page 
                SET title='" . $pagina->getTitle() . "', content='" . addslashes($pagina->getContent()) . "' 
                WHERE page_name = '" . $pagina->getPage_name() . "' and lang = '" . $pagina->getLang() . "' 
                ;";

        $this->conn->query($select);

        return $this->anyRowAffected();
    }

    /**
     * Actualiza información de un registro la tabla tm_partials.
     * 
     * @param Partial $partial Página a actualizar.
     * @return boolean `true` si se ha añadido, `false` si no.
     *
     * @author Ángel M. M. Díez
     */
    public function actualizarPartial($partial)
    {
        $select =
            "UPDATE tm_partials 
                SET  content='" . addslashes($partial->getContent()) . "' 
                WHERE partial_name = '" . $partial->getpartial_name() . "' and lang = '" . $partial->getLang() . "' 
                ;";

        $this->conn->query($select);
        return $this->anyRowAffected();
    }

    /**
     * Devuelve la información de la tabla tm_page que coincida con los parámetros pasados.
     *
     * Si no se pasan parametros, devuelve toda la información de la tabla.
     * 
     * Si algun campo es igual a `null` no se tendrá en cuenta a la hora 
     * de buscar las páginas correspondientes.
     * 
     * Cada elemento del array devuelto es a su vez un array sociativo 
     * con los campos 'page_name', 'lang', 'title' y 'content'.
     * 
     * @param string $page_name Nombre de la(s) página(s).
     * @param string $lang Idioma de la(s) página(s).
     * @return mixed Array con los registros de la tabla tm_page que coincidan.
     * 
     * @throws NoExistenRegistrosException Cuando no hay páginas que coinciden con la búsqueda.
     *
     * @author Ángel M. M. Díez
     */
    public function getPaginas($page_name = null, $lang = null)
    {
        if ($page_name != null) {
            if ($lang != null)
                $select = "SELECT * FROM tm_page WHERE page_name = '$page_name' and lang = '$lang' ORDER BY page_name, lang ;";
            else
                $select = "SELECT * FROM tm_page WHERE page_name = '$page_name' ORDER BY page_name, lang ;";
        } else if ($lang != null) {
            $select = "SELECT * FROM tm_page WHERE lang = '$lang' ORDER BY page_name, lang ;";
        } else {
            $select = "SELECT * FROM tm_page ORDER BY page_name, lang ;";
        }

        $resultados = $this->conn->query($select);

        if (!$this->anyRowAffected())
            throw new NoExistenRegistrosException("No existen páginas con estos parámetros. ");


        return $resultados->fetch_all(MYSQLI_ASSOC);
    }
    /**
     * Devuelve la información de la tabla tm_partials que coincida con los parámetros pasados.
     *
     * Si no se pasan parametros, devuelve toda la información de la tabla.
     * 
     * Si algun campo es igual a `null` no se tendrá en cuenta a la hora 
     * de buscar las páginas correspondientes.
     * 
     * Cada elemento del array devuelto es a su vez un array sociativo 
     * con los campos 'partial_name', 'lang' y 'content'.
     * 
     * @param string $partial_name Nombre de la(s) página(s).
     * @param string $lang Idioma de la(s) página(s).
     * @return mixed Array con los registros de la tabla tm_partials que coincidan.
     * 
     * @throws NoExistenRegistrosException Cuando no hay páginas que coinciden con la búsqueda.
     *
     * @author Ángel M. M. Díez
     */
    public function getPartials($partial_name = null, $lang = null)
    {
        if ($partial_name != null) {
            if ($lang != null)
                $select = "SELECT * FROM tm_partials WHERE partial_name = '$partial_name' and lang = '$lang' ORDER BY partial_name, lang ;";
            else
                $select = "SELECT * FROM tm_partials WHERE partial_name = '$partial_name' ORDER BY partial_name, lang ;";
        } else if ($lang != null) {
            $select = "SELECT * FROM tm_partials WHERE lang = '$lang' ORDER BY partial_name, lang ;";
        } else {
            $select = "SELECT * FROM tm_partials ORDER BY partial_name, lang ;";
        }

        $resultados = $this->conn->query($select);

        if (!$this->anyRowAffected())
            throw new NoExistenRegistrosException("No existe ningún partial con estos parámetros: $partial_name $lang. ");


        return $resultados->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Devuelve los nombres del páginas que hay en la web.
     * 
     * Lista con los datos de la columna `page_name` de la table tm_page.
     * 
     * @return array Array sociativo con los nombres del páginas tanto en la clave como en el valor.
     * 
     *
     * @author Ángel M. M. Díez
     */
    public function getPage_names()
    {

        $select = "SELECT DISTINCT page_name FROM tm_page  ;";

        $resultados = $this->conn->query($select);

        $page_names = [];

        foreach ($resultados->fetch_all() as $fila) {
            $page_names[$fila[0]] = $fila[0];
        };

        return $page_names;
    }

    /**
     * Devuelve los nombres del páginas que hay en la web.
     * 
     * Lista con los datos de la columna `partial_name` de la table tm_partials.
     * 
     * @return array Array sociativo con los nombres del páginas tanto en la clave como en el valor.
     * 
     *
     * @author Ángel M. M. Díez
     */
    public function getPartial_names()
    {

        $select = "SELECT DISTINCT partial_name FROM tm_partials  ;";

        $resultados = $this->conn->query($select);

        $partial_names = [];

        foreach ($resultados->fetch_all() as $fila) {
            $partial_names[$fila[0]] = $fila[0];
        };

        return $partial_names;
    }

    /**
     * Devuelve los nombres del páginas que están en ambos idiomas.
     * 
     * Llamamos nombre a la columna `page_name` de la table tm_page.
     * 
     * @return array Array con los nombres del páginas que hay en la web.
     * 
     *
     * @author Ángel M. M. Díez
     */
    public function getPage_namesEN_ES()
    {

        $select = "SELECT page_name FROM tm_page WHERE lang='es' AND page_name IN (SELECT page_name FROM tm_page WHERE lang='en') ;";

        $resultados = $this->conn->query($select);

        $page_names = [];

        foreach ($resultados->fetch_all() as $fila) {
            $page_names[] = $fila[0];
        };

        return $page_names;
    }
}
