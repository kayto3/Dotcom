class prixC {

	
function afficherprixs ($prix){
		echo "prix_initiale: ".$prix->getprix_initiale()."<br>";
		echo "pourcentageF: ".$prix->getpourcentageF()."<br>";
		echo "prix_finale: ".$prix->getprix_finale()."<br>";
	}
	function afficherprix(){
		//$sql="SElECT * From prix e inner join formationphp.prix a on e.prix_initiale= a.prix_initiale";
		$sql="SElECT * From prix";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function ajouterprixs($prix){
		$sql="insert into prix (prix_initiale,pourcentageF,prix_finale,pourcentage,datef) values (:prix_initiale,:pourcentageF,:prix_finale,:pourcentage,:datef)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $prix_initiale=$prix->getprix_initiale();
        $pourcentageF=$prix->getpourcentageF();
        $prix_finale=$prix->getprix_finale();
        $pourcentage=$prix->getpourcentage();
        $datef=$prix->getdatef();
		$req->bindValue(':prix_initiale',$prix_initiale);
		$req->bindValue(':pourcentageF',$pourcentageF);
		$req->bindValue(':prix_finale',$prix_finale);
		$req->bindValue(':pourcentage',$pourcentage);
		$req->bindValue(':datef',$datef);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}


	function supprimerprix($prix_initiale){
		$sql="DELETE FROM prix where prix_initiale= :prix_initiale";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':prix_initiale',$prix_initiale);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererprix($prix_initiale){
		$sql="SELECT * from prix where prix_initiale=$prix_initiale";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

class prixC {

	
function afficherprixs ($prix){
		echo "prix_initiale: ".$prix->getprix_initiale()."<br>";
		echo "prix_finale: ".$prix->getprix_finale()."<br>";
		echo "prixf: ".$prix->getprixf()."<br>";
	}
	function afficherprix(){
		//$sql="SElECT * From prix e inner join formationphp.prix a on e.prix_initiale= a.prix_initiale";
		$sql="SElECT * From prix";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
}