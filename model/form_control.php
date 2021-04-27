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
     * @param string $e Mensaje de la excepción si se lanzase.
     * @return boolean `true` si la longitud está dentro del rango adecuado.
     * 
     * @throws LongitudInvalidaException si la longitud de la cadena no está en el rango adecuado.
     */
    public static function checkLength($str = null, $minLength = 0, $maxLength = 'inf', $e = 'default')
    {
        if ($minLength < 0)
            $minLength = 0;
        if ($maxLength != null && $maxLength < $minLength)
            $maxLength = $minLength;
        if ($e = 'default')
            $e = "Longitud de parámetro invalida. El texto con contenido \"$str\" tiene una longitud de " . strlen($str) . " y debe estar entre $minLength y $maxLength caracteres. ";

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
     */
    public static function checkLang($lang)
    {

        if ($lang != 'es' &&  $lang != 'en')
            throw new DatoInvalidoException("Lenguaje desconocido. ");

        return true;
    }
}
