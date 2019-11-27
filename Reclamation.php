<?PHP
class reclamation{
	private $id;
	private $nom;
	private $date;
	public $Objet;
	private $mail;
	public  $msg;
	private $traitement;
	
	function __construct($id,$nom,$date,$Objet,$mail,$msg,$traitement){
		$this->id=$id;
		$this->nom=$nom;
		$this->date=$date;
		$this->Objet=$Objet;
		$this->mail=$mail;
		$this->msg=$msg;
		$this->traitement=$traitement;
		
	}
	
	function getid(){
		return $this->id;
	}
	function getnom(){
		return $this->nom;
	}
	
	function getdate(){
		return $this->date;
	}
	
	function getObjet(){
		return $this->Objet;
	}
	function getmail(){
		return $this->mail;
	}
	function getmsg(){
		return $this->msg;
	}
	function gettraitement(){
		return $this->traitement;
	}
	function setid($id){
		$this->id=$id;
	}
	
	function setnom($nom){
		$this->nom=$nom;
	}
	function setdate($date){
		$this->date=$date;
	}

	function setObjet($Objet){
		$this->Objet=$Objet;
	}
	function setmail($mail){
		$this->mail=$mail;
	}
	function setmsg($msg){
		$this->msg=$msg;
	}
	function settraitement($traitement){
		$this->traitement=$traitement;
	}
}

?>