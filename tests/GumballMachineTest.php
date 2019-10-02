<?php

/* hello */
require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;

    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }
    
    public function testAffichageProfAVI()
    {
        $this->gumballMachineInstance->AffichageProf("Before Insertion of Professors");
    }
    public function testInsertP()
    {
        $this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),"yassine","Amakrane","1994-04-22","Zagoura");
       
    }
    public function testAffichageProfAPI()
    {
        $this->gumballMachineInstance->AffichageProf("After Insertion of Professors");
    }
    
    
    
    public function testAffichageCoursAVI()
    {
        $this->gumballMachineInstance->AffichageCours("Before Insertion of Courses");
    }
    public function testInsertC()
    {
        $this->gumballMachineInstance->InsertC("IOT","12",$this->gumballMachineInstance->GetIdP("yassine","Amakrane"));
        
    }
    public function testAffichageCoursAPI()
    {
        $this->gumballMachineInstance->AffichageCours("After Insertion of Courses");
    }

   
}
