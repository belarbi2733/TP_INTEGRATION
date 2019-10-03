<?php
//test
class GumballMachine
{

	private $gumballs;
	
	private $bdd;
	private $servername="localhost";
	private $db_name="test";
	private $db_user="root";
	private $db_pass="";
	  
	
	function __construct()
	{
	    try
	    {
	        $this->bdd =  new PDO("mysql:host=$this->servername;dbname=$this->db_name", $this->db_user, $this->db_pass);
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql="CREATE TABLE  IF NOT EXISTS prof( id INT NOT NULL AUTO_INCREMENT , nom VARCHAR(25) NOT NULL , prenom VARCHAR(25) NOT NULL , date_naissance DATE NOT NULL , lieu_naissance TEXT NOT NULL , PRIMARY KEY (id)) ";
	        $this->bdd->exec($sql);
	        echo "\n New connexion";
	        
	        //print "Yes Dans le constructeur de BaseClass\n";
	    }
	    
	    catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	}

    public function getDB()
    {
        return $this->bdd;
    }
	
	public function AffichageProf($etat)
	{
	    print("\n".$etat."\n");
	    $stmt = $this->bdd->prepare("select * from prof");
	    $stmt->execute();
	    while($row = $stmt->fetch())
	    {
	        echo "* id: " . $row["id"]. " Last Name: " . $row["nom"]. " First Name: " . $row["prenom"]. " Birth Date: " . $row["date_naissance"]. " birth Place: " . $row["lieu_naissance"] ."\n";
	    }
	    return true;
	    
	}
	
	public function AffichageCours($etat)
	{
	    print("\n".$etat."\n");
	    $stmt = $this->bdd->prepare("select * from cours");
	    $stmt->execute();
	    while($row = $stmt->fetch())
	    {
	        echo "* id: " . $row["id"]. " Name: " . $row["intitule"]. " Time: " . $row["duree"]. " Id Prof: " . $row["id_prof"] ."\n";
	    }
	    
	}
	
	public function InsertP($bdd, $nom, $prenom , $date_naissance,$lieu)
	{  
	    try 
	    {
	       //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       $sql = "INSERT INTO prof (nom, prenom, date_naissance, lieu_naissance) VALUES ('$nom','$prenom', '$date_naissance','$lieu')";
	       $bdd->exec($sql);
	       echo "\n We Hae a new insertion of Professor";
	       return true;
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	        return false;
	    }
	    
	}
	
	public function GetIdP($nom,$prenom)
	{
	    $stmt = $this->bdd->prepare("select id from prof where nom=? and prenom=?");
	    $stmt->execute([$nom,$prenom]); 
	    $user = $stmt->fetch();
	    return $user['id'];
	}
	public function GetLastIDP()
	{
	    $stmt = $this->bdd->prepare("select max(id) as maximum from prof");
	    $stmt->execute();
	    $user = $stmt->fetch();
	    return $user['maximum'];
	}
	
	public function InsertC($intitule, $duree , $id_prof)
	{
	    try
	    {
	        //$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $sql = "INSERT INTO cours (intitule, duree, id_prof) VALUES ('$intitule','$duree', '$id_prof')";
	        $this->bdd->exec($sql);
	        return "\n We Have a new insertion of Corse";
	    }
	    catch(PDOException $e)
	    {
	        echo $sql . "<br>" . $e->getMessage();
	    }
	    
	}
	
	public function UpdateP()
	{
	    
	}
	
	public function DeleteP()
	{
	    
	}
}
