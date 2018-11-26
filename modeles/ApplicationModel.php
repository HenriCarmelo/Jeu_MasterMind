<?php

// Fonction permettant de récupérer le choix des pions de l'ordinateur

function choixPionsOrdinateur(Array $lettres,$nombrePions)
{
	$combinaisonFinale=array();
	$taille=count($lettres);
	if($nombrePions > $taille)
		return -1;
	for($i=0;$i<$nombrePions;$i++)
	{
		$val=rand(0,$taille-1);
		$combinaisonFinale[$i]=$lettres[$val];
	}
	return $combinaisonFinale;
}

// Fonction permettant de savoir le nombre de fois qu'un pion apparaît dans un tableau

function nombreOccurencesElement(Array $tableau,$element)
{
	$nombre=0;
	foreach ($tableau as $val) {
		if($element==$val)
		{
			$nombre++;
		}
	}
	return $nombre;
}


// Fonction Permettant de savoir le nombre de pions justes (Couleur juste et bien placé)
// Cette fonction nous renvoie également dans un tableau toutes les positions (indices) correspondant aux pions justes

function nombrePionsJuste(Array $lettresOrdinateur, Array $lettresUtilisateur)
{
    $nombrePions=0;
    $tab=array();
    $j=0;
    for ($i=0;$i<count($lettresUtilisateur);$i++) 
    {
        if($lettresUtilisateur[$i]==$lettresOrdinateur[$i])
        {
            $nombrePions++;
            $tab[$j]=$i;
            $j++;
        }
    }
    return array($nombrePions,$tab);
}



// Cette fonction permet de connaître le nombre de pions de couleur juste mais mals placés

function nombrePionsCouleurJuste(Array $lettresOrdinateur, Array $lettresUtilisateur)
{
	$nombrePions=0;
	$i=0;
	$infosPions=array();
	$infosPions=nombrePionsJuste($lettresOrdinateur,$lettresUtilisateur);
	$positionsPionsJuste=array();
	$positionsPionsJuste=$infosPions[1];
	$tabPositionJustes=array();
	$j=0;
	for($i=0;$i<count($positionsPionsJuste);$i++)
	{
		$tabPositionJustes[$i]=$lettresOrdinateur[$positionsPionsJuste[$i]];
	}
	
	foreach ($lettresUtilisateur as $lettre_Utilisateur) 
	{
		
		if(in_array($lettre_Utilisateur, $lettresOrdinateur))
    		{
    			if (!($lettresUtilisateur[$j]==$lettresOrdinateur[$j]))
    			{
    				$nombrePions++;
    			}
    		}
		$j++;
	}
	return $nombrePions;
}


function ajouterResultatChoixUser($nombrePionsMalPlaces,$nombrePoinsJuste)
{
    global $connexion;
    try
    {
        $req = $connexion->prepare(
                'INSERT INTO statistiques(nombre_pions_mal_places,nombre_pions_juste)'
                . ' VALUES(:nombrePionsMalPlaces,:nombrePionsJuste)'
                );
       
        $req->bindParam(':nombrePionsMalPlaces', $nombrePionsMalPlaces, PDO::PARAM_INT, 11);
        $req->bindParam(':nombrePionsJuste',$nombrePoinsJuste, PDO::PARAM_INT, 11);
        $req->execute();
        return $connexion->lastInsertId();
    }
    catch (PDOException $e) 
    {
        die($e->getMessage());
    }
}

// Cette fonction nous permet d'insérer le choix (la combinaison de pions) de l'utilisateur dans notre base de données

function ajouterChoix($nomTable,$tableau)
{
    global $connexion;
    try
    {
        $req = $connexion->prepare(
                "INSERT INTO $nomTable(val1,val2,val3,val4) VALUES(:val1,:val2,:val3,:val4)");
        $req->bindParam(':val1', $tableau[0], PDO::PARAM_INT, 11);
        $req->bindParam(':val2',$tableau[1], PDO::PARAM_INT, 11);
        $req->bindParam(':val3',$tableau[2], PDO::PARAM_INT, 11);
         $req->bindParam(':val4',$tableau[3], PDO::PARAM_INT, 11);
        $req->execute();
        return $connexion->lastInsertId();
    }
    catch (PDOException $e) 
    {
        die($e->getMessage());
    }
}

// Cette fonction nous permet de récupérer toutes les données contenues dans une table de notre base de données

function selectionnerChoix($nomTable)
{
    global $connexion;
    try
    {
        $req = $connexion->prepare("SELECT * FROM $nomTable");
        $req->execute();
        $donnees=$req->fetchAll();
        return $donnees;
    }
    catch (PDOException $e) 
    {
        die($e->getMessage());
    }
}


// Cette fonction nous permet de supprimer toutes les données contenues dans une table de notre base de données

function supprimerChoix($nomTable)
{
    global $connexion;
    try
    {
        $req = $connexion->prepare("DELETE FROM $nomTable");
        $req->execute();
    }
    catch (PDOException $e) 
    {
        die($e->getMessage());
    }
}


// Cette fonction nous permet de renseigner le nombre de parties dans notre base de données

function ajouterNombre($nb)
{
    global $connexion;
    try
    {
        $req = $connexion->prepare(
                "INSERT INTO  nombre_parties(nb) VALUES(:val1)");
        $req->bindParam(':val1',$nb, PDO::PARAM_INT, 11);
        $req->execute();
        return $connexion->lastInsertId();
    }
    catch (PDOException $e) 
    {
        die($e->getMessage());
    }
}