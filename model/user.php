<?php

require 'form_control.php';
require 'db/traduceme/conexion.php';

class User
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
        self::validarUser($usuario, $contraseña);

        $hash = password_hash($contraseña, PASSWORD_DEFAULT);

        $conn = new Consulta();

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
    private static function validarUser($usuario, $contraseña)
    {
        FormControl::checkLength($usuario, 4, 16, 'nombre de usuario');
        FormControl::checkLength($contraseña, 4, 24, 'contraseña');
    }

    /**
     * Comprueba que los datos introducidos son de un administrador.
     *
     * @param string $usuario Nombre del administrador.
     * @param string $contraseña Contraseña del administrador.
     *  
     * @return boolean Si coinciden los datos con la BD `true`; si no, `false`.
     */
    public static function isAdmin($usuario, $contraseña)
    {
        $conn = new Consulta();
        try {
            $hash = $conn->getHash($usuario);
        } catch (BDException $e) {
            return false;
        }


        if (password_verify($contraseña, $hash))
            return true;

        return false;
    }
}
