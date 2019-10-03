<?php

/* hello */
require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    
    private $nom="XXX1";
    private $prenom="YYY1";
    private $date_naissance="1972-04-22";
    private $lieu_naissance="Mons";
    
    private $intitule="ZZZ2";
    private $duree="12";
    
        
    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }
    
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
    public function testInsertP()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom,$this->prenom,$this->date_naissance,$this->lieu_naissance));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
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
        $resultat=$this->gumballMachineInstance->InsertC($this->intitule,$this->duree,$this->gumballMachineInstance->GetIdP($this->nom,$this->prenom));
        echo $resultat."     liverpool \n";
        $this->assertContains('\n We Have a new insertion of Corse', $resultat);
        
    }
    public function testAffichageCoursAPI()
    {
        $this->gumballMachineInstance->AffichageCours("After Insertion of Courses");
    }

   
}
