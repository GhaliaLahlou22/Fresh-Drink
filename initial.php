<?php
// init bd 

function inititialisationBD(){
    $user="root";
    $password = "";
    $db="Fresh_drink";
    $host = "localhost";
    
    $mysqli = new mysqli("$host" , $user , $password , $db);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit()
    }
    return $mysqli
}


function remplissageBD($hierarchie , $Recettes){

    $mysqli = inititialisationBD();

    $requete = "CREATE DATABASE IF NOT EXISTS Fresh_drink";

    if($stmt = $mysqli->prepare($requete)){
        $stmt->execute();
    }
    if($stmt){
        //creation des tables 
        $requete = "CREATE TABLE IF NOT EXISTS Utulisateur(
            nomUtilisateur varchar(50) , 
            prenomUtilisateur varchar(50),
            birthday  date,
            sexe  varchar(10) check ('Femme' or 'Homme'),
            CP   number(5),
            ville varchar(50),
            adress varchar(100) ,
            email varchar(100) not null,
            mdp varchar(50) not null
        )";
        $stmt = $mysqli->prepare($requete);
        $stmt->execute();

    
        $requete = "CREATE TABLE IF NOT EXISTS Aliment (
            nomAliment  varchar(50) primary key,
            preparationaliment varchar(100)  
        )";
        $stmt = $mysqli->prepare($requete);
        $stmt->execute();


        $requete = "CREATE TABLE IF NOT EXISTS Coctail (
        nomCoctail  varchar(50) primary key,
        preparation varchar(100) , 
        ingredient varchar(100)
        )";
        $stmt = $mysqli->prepare($requete);
        $stmt->execute();
    

        $requete = "CREATE TABLE IF NOT EXISTS Laison (
        nomAliment varchar(50), 
        nomCoctail varchar(50),
        primary key (nomAliment  , nomCoctail ) 
        )";
        $stmt = $mysqli->prepare($requete);
        $stmt->execute();

        include_once("./Donnees.inc.php");

        //rempissage des tables 
        foreach($hierarchie as $nom => $aliment){
            if(isset($aliment("sous-categorie")))
        }


    }
   

}



?>