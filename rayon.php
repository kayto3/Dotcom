<?PHP
class rayon{
	private $ID_rayon;
	private $nom;
	
	function __construct($nom){
		
		$this->nom=$nom;
		
		
	}
	
	function getID_rayon(){
		return $this->ID_rayon;
	}
	function getNom(){
		return $this->nom;
	}
	

function setID_rayon($ID_rayon){
		$this->ID_rayon=$ID_rayon;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	
	
	
}

?>