<?PHP
include "../config.php";
class RayonC {

	
function afficherrayon ($rayon){
		echo "ID_rayon: ".$rayon->getID_rayon()."<br>";
		echo "nom: ".$produit->getnom()."<br>";

	
	}
	function afficherayon(){
		//$sql="SElECT * From rayon e inner join formationphp.rayon a on e.ID_rayon= a.ID_rayon";
		$sql="SElECT * From rayon";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function ajouterrayon($rayon){
		$sql="insert into rayon (nom_rayon) values (:nom)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$rayon->getnom();
       
      
		$req->bindValue(':nom',$nom);
	
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function modifierrayon($rayon){
		$sql="UPDATE rayon SET  nom_rayon=:nom_rayon WHERE ID_rayon=:ID_rayon";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$rayon->getnom();
		$ID_rayon=$rayon->getID_rayon();

		//$datas = array(':ide_rayon'=>$ide_rayon, ':ID_rayon'=>$ID_rayon, ':nom_rayon'=>$nom_rayon);
		/*$req->bindValue(':ide_rayon',$ide_rayon);*/
		$req->bindValue(':ID_rayon',$ID_rayon);
		$req->bindValue(':nom_rayon',$nom);

		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function supprimerrayon($ID_rayon){
		$sql="DELETE FROM rayon where ID_rayon= :ID_rayon";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ID_rayon',$ID_rayon);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererrayon($rayon){
		$sql="SELECT * from rayon where ID_rayon=$rayon";
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

?>