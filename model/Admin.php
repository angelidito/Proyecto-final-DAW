<?php

require_once 'form_control.php';
require_once 'db/traduceme/conexion.php';

class Admin
{

    /**
     * Añade un administrador a la base de datos.
     * 
     * Comprueba que el nombre y la contraseña tengan una longitud valida.
     *
     * @param string $usuario Nombre de usuario con entre 4 y 16 caracteres.
     * @param string $contraseña Contraseña con entre 4 y 24 caracteres.
     *
     * @return boolean Si se ha añadido a la BD `true`; si no, `false`.
     * 
     * @throws FormException Cuando alguno de los parametros del objeto no son validos.
     * 
     * @author Ángel M. M. Díez
     */
    public static function añadirAdmin($usuario, $contraseña)
    {
        $conn = new Consulta();

        self::validarDatos($usuario, $contraseña);

        $hash = password_hash($contraseña, PASSWORD_DEFAULT);

        return $conn->añadirAdmin($usuario, $hash);
    }

    /**
     * Comprueba que el nombre y la contraseña tengan una longitud valida.
     * 
     * @param string $usuario Nombre de usuario con entre 4 y 16 caracteres.
     * @param string $contraseña Contraseña con entre 4 y 24 caracteres.
     *
     * @return boolean `true` si los parámetros tienen la longitud adecuada.
     * @throws FormException Cuando alguno de los atributos del objeto no son validos.
     *
     * @author Ángel M. M. Díez
     */
    private static function validarDatos($usuario, $contraseña)
    {
        FormControl::checkLength($usuario, 4, 16, 'nombre de usuario');
        FormControl::checkLength($contraseña, 4, 24, 'contraseña');
    }

    /**
     * Comprueba que los datos introducidos son de un administrador y registra el acceso en la base de datos.
     * 
     * @param string $usuario Nombre del administrador.
     * @param string $contraseña Contraseña del administrador.
     *  
     * @return boolean Si coinciden los datos con la BD `true`; si no, `false`.
     */
    public static function solicitarAcceso($usuario, $contraseña)
    {
        $success = self::isAdmin($usuario, $contraseña);

        $conn = new Consulta();
        $conn->registrarAcceso($success, $usuario, $contraseña);

        return $success;
    }

    /**
     * Comprueba que los datos introducidos son de un administrador.
     *
     * @param string $usuario Nombre del administrador.
     * @param string $contraseña Contraseña del administrador.
     * @param Consulta $conn Consulta con conexión a la base de datos. 
     *  
     * @return boolean Si coinciden los datos con la BD `true`; si no, `false`.
     */
    private static function isAdmin($usuario, $contraseña)
    {

        try {
            $conn = new Consulta();
            $hash = $conn->getHash($usuario);
        } catch (BDException $e) {
            return false;
        }

        if (password_verify($contraseña, $hash))
            return true;

        return false;
    }

    public static function generarAccesosJSON()
    {
        $cacheVars = '../cache/vars/';

        if (!file_exists($cacheVars)) {
            mkdir($cacheVars, 0777, true);
            $file = fopen($cacheVars . '/index.php', "w");
            fwrite($file, '<?php header("Location: ../"); exit;');
            fclose($file);
        }

        $conn = new Consulta();
        $file = fopen($cacheVars . '/adminAccess.json', "w");
        fwrite($file, json_encode($conn->getAccess(), JSON_PRETTY_PRINT));
        fclose($file);
    }
}
