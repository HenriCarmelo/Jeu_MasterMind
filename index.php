<?php
include("modeles/connexionModel.php");
include("modeles/ApplicationModel.php");


//var_dump(nombrePionsJuste($lettresOrdinateur,$lettresUtilisateur));
//var_dump(nombrePionsCouleurJuste($lettresOrdinateur,$lettresUtilisateur));
//ajouterChoix(1,2);

if (isset($_GET['action'])) 
{
    switch ($_GET['action']) 
    {
    	case 'choixUser':
            include("controleurs/ApplicationController.php");
            break;  
   	}
}
else
{
	include("controleurs/ApplicationController.php");
}