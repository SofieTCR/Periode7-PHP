<?php
require_once("../vendor/autoload.php");

use Opdracht7\classes\Teacher;
use Opdracht7\classes\Student;
use Opdracht7\classes\Schooltrip;
use Opdracht7\classes\Group;


$SOD2A = new Group("SOD2A");
$SOD2B = new Group("SOD2B");

$myTeacher = new Teacher("Jan van der Brugge");
$myTeacher->SetSalary(2384.73);
$myTeacher = new Teacher("Barry van Helden");
$myTeacher->SetSalary(2235.36);
$myTeacher = new Teacher("Rob Wigmans");
$myTeacher->SetSalary(2138.23);

$mySchooltrip = new Schooltrip("Walibi", 5);
$mySchooltrip->AddStudent(new Student("Jack van Bommel", $SOD2A));
$mySchooltrip->AddStudent(new Student("Stacey Peters", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Sofie Brink", $SOD2A));
$mySchooltrip->AddStudent(new Student("Mieke van der Stel", $SOD2A));
$mySchooltrip->AddStudent(new Student("Kim van der Zande", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Kees Co", $SOD2A));
$mySchooltrip->AddStudent(new Student("Truus de Wit", $SOD2B, true));
$mySchooltrip->AddStudent(new Student("Sjaakie de Wit", $SOD2B, true));
$mySchooltrip->AddStudent(new Student("Bart Boos", $SOD2A, true));
$mySchooltrip->AddStudent(new Student("Sandra Kaard", $SOD2B));
$mySchooltrip->AddStudent(new Student("Clara de Groot", $SOD2A));
$mySchooltrip->AddStudent(new Student("Jan-Joost Kaas", $SOD2B));
$mySchooltrip->AddStudent(new Student("Tjerk Steeg", $SOD2A, true));

// var_dump($mySchooltrip);
echo($mySchooltrip->GetTable());
?>