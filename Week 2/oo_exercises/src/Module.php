<?php


namespace TUDublin;


class Module
{
    private $id;
    private $title;
    private $moduleCode;

    public function __construct($id, $title, $moduleCode)
    {
        $this->id = $id;
        $this->title = $title;
        $this->moduleCode = $moduleCode;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getModuleCode()
    {
        return $this->moduleCode;
    }

    public function setModuleCode($moduleCode)
    {
        $this->moduleCode = $moduleCode;
    }

    public function __toString() {
        return PHP_EOL . '__________________________________' .
        "\n"    .   'id = '     . $this->id .
        PHP_EOL .   'title = '  . $this->title .
        "\n"    .   'code = '   . $this->moduleCode;
    }



}