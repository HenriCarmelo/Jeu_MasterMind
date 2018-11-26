<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Ce fichier.php nous permet de nous connecter à notre base de données

function connexion() 
{
    try 
    {
         $bdd = new PDO('mysql:host=localhost;dbname=db_mastermind;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
         return $bdd; 
    } 
    catch (Exception $e) 
    {
        echo 'Exception reçue : ',  $e->getMessage(), "\n";
    }
   
}

$connexion = connexion();

