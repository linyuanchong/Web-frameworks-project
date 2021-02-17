<?php


namespace TUDublin;


class ModuleRepository
{
    private $modules;

    public function __construct()
    {
        $this->modules = [];

        $module1 = new Module(1, "Web Development", "COMP-WBDV");
        $this->modules[1] = $module1;

        $module2 = new Module(2, "Network Troubleshooting", "COMP-TSHOOT");
        $this->modules[2] = $module2;

        $module3 = new Module(4, "Data Structures", "COMP-DAS");
        $this->modules[3] = $module3;

    }

    public function getAll() {
        return $this->modules;
    }

    //Get one specific module.
    public function getOne($id) {
        if(isset($this->modules[$id])) {
            return $this->modules[$id];
        }
        else {
            return NULL;
        }

    }


}