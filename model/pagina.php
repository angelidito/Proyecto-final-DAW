<?php
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
     * @throws FormException Cuando los parámetros no son válidos.
     */
    public function __construct($_page_name, $_lang, $_title, $_content)
    {
        FormControl::checkLength($_page_name, 5, 40);
        FormControl::checkLang($_lang);
        FormControl::checkLength($_title, 5, 70);
        FormControl::checkLength($_content, 13, 65535);

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
