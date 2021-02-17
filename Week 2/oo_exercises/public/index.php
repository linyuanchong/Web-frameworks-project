<?php

//Include autoload. **IMPORTANT**
require_once __DIR__ . '/../vendor/autoload.php';

//By using composer, we dont have to "include" anymore.
//cmd: composer dump_autoload to generate "vendor" file.

//Run Application.php. **This is a debug file, no methods are to be declared here.**

//Highlight code and CTRL+/ to bulk comment.
//use TUDublin\Student;
//$student1 = new Student(1, "Donovan", "Nixon", "316");
//$student2 = new Student(1, "Linyuan", "Chong", "613");
//Store objects into array.
//$studentData = [student1, $student2];
//var_dump($studentData);

use TUDublin\ModuleRepository;
$newModuleRepository = new ModuleRepository();
$modules = $newModuleRepository->getAll();
$numModules = sizeof($modules);

$module1 = $newModuleRepository->getOne(1);
print($module1);

print PHP_EOL . "_____________________";

$module100 = $newModuleRepository->getOne(100);
print($module100);
