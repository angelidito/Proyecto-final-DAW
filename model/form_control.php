<?php

class FormControl
{
    /**
     * Lanza excepción si la longitud de la cadena no está en el rango adecuado.
     * 
     *
     * @param string $str Cadena cuya longidud se sebe comprobar.
     * @param integer $minLength Longitud mínima de la cadena.
     * @param integer $maxLength Longitud máxima de la cadena.
     * @param string $param Nombre del parámetro para incluirlo en la excepción si se lanzase.
     * @return boolean `true` si la longitud está dentro del rango adecuado.
     * 
     * @throws LongitudInvalidaException si la longitud de la cadena no está en el rango adecuado.
     *
     * @author Ángel M. M. Díez
     */
    public static function checkLength($str = null, $minLength = 0, $maxLength = 'inf', $param = '')
    {
        if ($minLength < 0)
            $minLength = 0;
        if ($maxLength != null && $maxLength < $minLength)
            $maxLength = $minLength;

        $e =
            ($param != '' ? "El parámetro '<strong>$param</strong>' tiene una longitud invalida. Contiene \"$str\" y" : "Hay un parámetro con longitud inválida. El texto con contenido \"<strong>$str</strong>\"") .
            " tiene una longitud de <strong>" .
            strlen($str) .
            " caracteres</strong> y debe estar entre <strong>$minLength y $maxLength caracteres</strong>. ";

        $len = strlen($str);

        if ($len < $minLength || ($maxLength != 'inf' && $maxLength < $len))
            throw new LongitudInvalidaException($e);

        return true;
    }

    /**
     * Lanza excepción si la cadena no es `en` o `es`.
     * 
     *
     * @param string $lang Lenguaje.
     * @return boolean `true` si la longitud está dentro del rango adecuado.
     * 
     * @throws DatoInvalidoException si la longitud de la cadena no está en el rango adecuado.
     *
     * @author Ángel M. M. Díez
     */
    public static function checkLang($lang)
    {

        if ($lang != 'es' &&  $lang != 'en')
            throw new DatoInvalidoException("Lenguaje desconocido. ");

        return true;
    }


    /**
     * Lanza excepción si la cadena es `header` o `footer`.
     * 
     *
     * @param string $page_name Nombre de la página.
     * @return boolean `true` si la el parámetro no tiene como valor 'header' ni 'footer'.
     * 
     * @throws DatoInvalidoException si la longitud de la cadena no está en el rango adecuado.
     *
     * @author Ángel M. M. Díez
     */
    public static function checkPage_Name($page_name)
    {
        if ($page_name == 'header' ||  $page_name == 'footer')
            throw new DatoInvalidoException(" . Error: no puedes crear una página con nombre'header' o 'footer'. ");

        return true;
    }

    /**
     * Comprueba que la cadena no sea  null o esté vacía.
     * 
     *
     * @param string $str Cadena a comprobar.
     * @return boolean `true` si la cadena no es null o ni está vacía.
     *
     * @throws FormException si la cadena es null o está vacía.
     *
     * @author Ángel M. M. Díez
     */
    public static function notNullOrVoid($str)
    {
        if ($str == null)
            throw new DatoInvalidoException("Cadena con valor <pre>null</pre>. ");
        if ($str == '')
            throw new LongitudInvalidaException("Cadena vacía. ");

        return true;
    }
}
