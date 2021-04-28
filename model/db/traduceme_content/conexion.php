<?php

require 'datos_config.php';


/**
 * Clase con conexión a la BD perros_raza.
 *
 * @param mysqli $conn
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
 * Clase para realizar consultas en la BD perro_raza.
 *
 * Contiene multitud de métodos.
 *
 */
class Consulta extends Conexion
{
    /**
     * Constructor de la clase.
     *
     * Establece una conexión con la BD perro_raza.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Añade una página a la base de datos.
     *
     * @param Pagina $pagina Página a añadir.
     *
     * @return boolean `true` si la página se ha añadido a la base de datos. `false` si no.
     */
    //  * @throws NoFilasAfectadasException Si no se ha visto afectada ninguna fila de la BD.
    public function añadirPagina($pagina)
    {
        $datosPagina = $pagina->toArray();

        $insert =
            "INSERT INTO
                tm_page (page_name, lang, title, content)
            VALUES
                ('$datosPagina[0]', '$datosPagina[1]', '$datosPagina[2]', '" . addslashes($datosPagina[3]) . "');";

        // echo $insert;

        $this->conn->query($insert);

        if ($this->conn->affected_rows < 1) {
            // No sé qué podría hacer que se lanzase. Creo que nada, pero por si acaso.
            // throw new NoFilasAfectadasException('Aparentemente algo a ido mal y no se ha realizado el insert.');
            return false;
        }

        return true;
    }

    /**
     * Devuelve información de la tabla tm_page.
     *
     * Si no se pasan parametros, devuelve toda la información de la tabla.
     * 
     * Si algun campo es igual a `null` no se tendrá en cuenta a la hora 
     * de buscar las páginas correspondientes.
     * 
     * @param string $page_name Nombre de la(s) página(s).
     * @param string $lang Idioma de la(s) página(s).
     * @return array Array sociativo con campos 'page_name', 'lang', 'title' 
     *               y 'content' de la(s) página(s) buscada(s).
     * 
     */
    public function getPaginas($page_name = null, $lang = null)
    {
        if ($page_name != null) {

            if ($lang != null)
                $select = "SELECT  * FROM  tm_page WHERE  page_name = '$page_name' and lang = '$lang' ;";

            else
                $select = "SELECT  * FROM  tm_page WHERE  page_name = '$page_name' ;";
        }
        $select = "SELECT  * FROM  tm_page WHERE  page_name = '$page_name' and lang = '$lang' ;";


        $resultados = $this->conn->query($select);

        $pagina = $resultados->fetch_all(MYSQLI_ASSOC)[0];

        return $pagina;
    }
    /**
     * Duevuelve el ID del último perro añadido a la BD.
     *
     * @return int ID del último perro añadido.
     */
    public function getUltimoIdPerro()
    {
        return $this->conn->query("SELECT id FROM perro ORDER BY id DESC LIMIT 1;")->fetch_all(MYSQLI_NUM)[0][0];
    }

    /**
     * Busca y devuelve los perros la raza elegida.
     *
     * Busca en la base de datos a todos los perros con el ID de raza pasado como parámetro.
     *
     * @param int $id_raza ID de la raza a buscar
     *
     * @return mixed Array de arrays asociativos, esto últimos tendrán con los campos 'id', 'nombre', 'horas_paseo' y 'dueño'.
     *
     * * @throws NoFilasAfectadasException Si no se ha visto afectada ninguna fila de la BD.
     */
    public function getPerrosPorRaza($id_raza)
    {
        $select =
            "SELECT 
                id, nombre, horas_paseo, dueño
            FROM 
                perro
            WHERE
                id_raza = '$id_raza'
            ;";

        $resultados = $this->conn->query($select);

        if ($this->conn->affected_rows < 1) {
            // $id_raza se obtiene de las propia base de datos, por lo que no debería lanzarase por su culpa.
            // No sé qué podría hacer que se lanzase. Creo que nada, pero por si acaso.
            throw new NoFilasAfectadasException('Aparentemente algo a ido mal y no se ha encontrado ningún perro de la raza escojida. Contacte con el administrador para que se asegure de que existen perros de esta raza. <br> De cualquier forma, tenga en cuenta que es posible que no haya sido añadido todavía ninguno.');
        }

        return $resultados->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Actualiza los cuidados especiales de una raza.
     *
     * @param int $id_raza ID de la raza a actualizar.
     * @param Raza $raza Raza a cambiar los cuidados.
     *
     * @throws NoFilasAfectadasException Si no se ha visto afectada ninguna fila de la BD.
     */
    public function actualizarCuidados($id_raza, $raza)
    {

        $cuidados = $raza->getCuidadosEspeciales();
        $update =
            "UPDATE 
                raza 
            SET 
                cuidados_especiales = '$cuidados'
            WHERE id = $id_raza
            ;";

        $this->conn->query($update);

        if ($this->conn->affected_rows < 1) {
            // $id_raza se obtiene de las propia base de datos, por lo que no debería lanzarase por su culpa.
            // No sé qué podría hacer que se lanzase. Creo que nada, pero por si acaso.
            throw new NoFilasAfectadasException("No se ha actulizado ningun registro. Compruebe que el texto insertado es distinto del existente.");
        }
    }

    /**
     * Borra un perro de la BD.
     *
     * @param int $id_perro ID del perro a borrar.
     *
     * @throws NoFilasAfectadasException Si no se ha visto afectada ninguna fila de la BD.
     */
    public function eliminarPerro($id_perro)
    {
        $delete =
            "DELETE FROM 
                perro 
            WHERE 
                id = $id_perro
            ;";

        $this->conn->query($delete);

        if ($this->conn->affected_rows < 1) {
            throw new NoFilasAfectadasException("No se ha encontrado el ID en la base de datos, por lo que no ha sido posible eliminar el registro.");
        }
    }
}
