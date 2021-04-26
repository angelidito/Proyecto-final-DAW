<?php
// Excepción imagenes

// Excepciones En formularios
class FormException extends Exception
{
}
class LongitudInvalidaException extends FormException
{
}


// Excepciones BD
class BDException extends Exception
{
}
class UsuarioNoRegistradoException extends BDException
{
}
class NoFilasAfectadasException extends BDException
{
}
