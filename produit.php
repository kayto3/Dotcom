<?PHP
class produit{
	private $ID_produit;
	private $nom;
	private $prix;
	
	function __construct($nom,$prix){
		
		$this->nom=$nom;
		$this->prix=$prix;
		
	}
	
	function getID_produit(){
		return $this->ID_produit;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrix(){
		return $this->prix;
	}

function setID_produit($ID_produit){
		$this->ID_produit=$ID_produit;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrix($prenom){
		$this->prix;
	}
	
	
}

?>