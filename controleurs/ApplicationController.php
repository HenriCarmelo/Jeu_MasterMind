<?php 
  
  $combinaisonOrdinateur;
  $lettres=['R','J','B','O','V','N'];
  $statistiques=array();
  
  //$nombrePions=4;
  $lettresOrdinateur=['O','O','O','R'];
  $lettresUtilisateur=['R','O','O','J'];
  $tousLesChoixUser=array();
  $resultatsChoix=array();
if (isset($_GET['ctrlaction'])) 
{
    switch ($_GET['ctrlaction']) 
    {
    	case 'enregistrerChoixUser':
    	    if(isset($_POST['choix0']))
		  	{
		  	 	$nombreParties=selectionnerChoix("nombre_parties");
		  	 	$combinaisonOrdinateur=selectionnerChoix("ordinateur");
		  	 	$copie_combinaisonOrdinateur=array($combinaisonOrdinateur[0]['val1'],$combinaisonOrdinateur[0]['val2'],$combinaisonOrdinateur[0]['val3'],$combinaisonOrdinateur[0]['val4']);

		  	 	$choixUser=array($_POST['choix0'],$_POST['choix1'],$_POST['choix2'],$_POST['choix3']);
		  	 	$nombrePionsMalPlaces=nombrePionsCouleurJuste($copie_combinaisonOrdinateur,$choixUser);
		  	 	$nombrePoinsJuste=nombrePionsJuste($copie_combinaisonOrdinateur,$choixUser);
		  	 	ajouterResultatChoixUser($nombrePionsMalPlaces,$nombrePoinsJuste[0]);
		  	 	ajouterChoix("choixduuser",$choixUser);
		  	 	$resultatsChoix=selectionnerChoix("statistiques");
		  	 	$tousLesChoixUser=selectionnerChoix("choixduuser");
		  	 	//header('Location:index.php');
		  	}
            require("vues/ApplicationVue.php");
            break;
    }
}
else
{
	  supprimerChoix("statistiques");
  	supprimerChoix("ordinateur");
  	supprimerChoix("choixduuser");
  	supprimerChoix("nombre_parties");
  	$combinaisonOrdinateur=choixPionsOrdinateur($lettres,4);
  	ajouterNombre(8);
  	ajouterChoix("ordinateur",$combinaisonOrdinateur);
  	require("vues/ApplicationVue.php");
}
 