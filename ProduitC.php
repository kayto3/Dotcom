<?PHP
include "../config.php";
class ProduitC {

	
function afficherproduit ($produit){
		echo "ID_produit: ".$produit->getID_produit()."<br>";
		echo "nom: ".$produit->getnom()."<br>";
		echo "prix: ".$produit->getprix()."<br>";
	
	}
	function afficheproduit(){
		//$sql="SElECT * From produit e inner join formationphp.produit a on e.ID_produit= a.ID_produit";
		$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function ajouterproduit($produit){
		$sql="insert into produit (nom_produit,prix) values (:nom,:prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$produit->getnom();
        $prix=$produit->getprix();
      
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prix',$prix);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}

	function modifierProduit($produit){
		$sql="UPDATE produit SET  nom_produit=:nom_produit,prix=:prix WHERE ID_produit=:ID_produit";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$produit->getnom();
        $prix=$produit->getprix();
		$ID_produit=$produit->getID_produit();

		//$datas = array(':ide_produit'=>$ide_produit, ':ID_produit'=>$ID_produit, ':nom_produit'=>$nom_produit,':prix'=>$prix);
		/*$req->bindValue(':ide_produit',$ide_produit);*/
		$req->bindValue(':ID_produit',$ID_produit);
		$req->bindValue(':nom_produit',$nom);
		$req->bindValue(':prix',$prix);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function supprimerproduit($ID_produit){
		$sql="DELETE FROM produit where ID_produit= :ID_produit";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ID_produit',$ID_produit);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function recupererproduit($produit){
		$sql="SELECT * from produit where ID_produit=$produit";
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