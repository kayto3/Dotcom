<?PHP
class promotion{
	private $ref;
	private $nomp;
	private $photop;
	private $prixi;
	private $pourcentage;
	private $prixf;
	function __construct($ref,$nomp,$photop,$prixi,$pourcentage,$prixf){
		$this->ref=$ref;
		$this->nomp=$nomp;
		$this->photop=$photop;
		$this->prixi=$prixi;
		$this->pourcentage=$pourcentage;
		$this->prixf=$prixf;
	}
	
	function getref(){
		return $this->ref;
	}
	function getnomp(){
		return $this->nomp;
	}
	function getprixi(){
		return $this->prixi;
	}
	function getpourcentage(){
		return $this->pourcentage;
	}
	function getprixf(){
		return $this->prixf;
	}
	function getphotop(){
		return $this->photop;
	}
	function setref($ref){
		$this->ref=$ref;
	}
	function setnomp($nomp){
		$this->nomp=$nomp;
	}
	function setprixi($prixi){
		$this->prixi;
	}
	function setpourcentage($pourcentage){
		$this->pourcentage=$pourcentage;
	}
	function setprixf($prixf){
		$this->prixf=$prixf;
	}
	
}



?>
