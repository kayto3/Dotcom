<?PHP
include "../config.php";
class reclamationC{
function afficherReclamation ($reclamation){
		echo "id: ".$reclamation->getid()."<br>";
		echo "nom: ".$reclamation->getnom()."<br>";
		echo "date: ".$reclamation->getdate()."<br>";
		echo "Objet: ".$reclamation->getObjet()."<br>";
		echo "mail: ".$reclamation->getmail()."<br>";
		echo "msg: ".$reclamation->getmsg()."<br>";
	}
	
	function ajouterReclamation($reclamation){
			$sql="insert into reclamation (id,nom,date,Objet,mail,msg) values (:id,:nom, :date,:Objet,:mail,:msg)";
		$db = config::getConnexion();
		try{
		
        $req=$db->prepare($sql);
        $id=$reclamation->getid();
        $nom=$reclamation->getnom();
        $date=$reclamation->getdate();
        $Objet=$reclamation->getObjet();
        $mail=$reclamation->getmail();
        $msg=$reclamation->getmsg();
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':date',$date);
		$req->bindValue(':Objet',$Objet);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':msg',$msg);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherReclamations(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerReclamation($id){
		$sql="DELETE FROM reclamation where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierReclamation($reclamation,$id){
		$sql="UPDATE reclamation SET nom=:nom ,date=:date,mail=:mail,Objet=:Objet,msg=:msg,traitement=:traitement WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$reclamation->getid();
		$nom=$reclamation->getnom();
        $date=$reclamation->getdate();
        $Objet=$reclamation->getObjet();
        $msg=$reclamation->getmsg();
        $traitement=$reclamation->gettraitement();
		$datas = array(':id'=>$id,':nom'=>$nom, ':date'=>$date,':mail'=>$mail,':Objet'=>$Objet ,':msg'=>$msg,':traitement'=>$traitement);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':date',$date);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':Objet',$Objet);
		$req->bindValue(':msg',$msg);
		$req->bindValue(':traitement',$traitement);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererReclamation($id){
		$sql="SELECT * from reclamation where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function rechercherReclamation($HI){
		$sql="SELECT * from reclamation where id LIKE '%$HI%' or nom LIKE '%$HI%' or date LIKE '%$HI%' ";
		$db = config::getConnexion();
		try{
		    $sth = $db->prepare($sql);
			$sth->execute();
			$liste = $sth->fetchAll();
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>