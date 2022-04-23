<?php 
    $login = 'root';
    $mdp ='';
    try
    {
        $con = new PDO("mysql:host=localhost;dbname=gest_etu_php",$login,$mdp);
    }catch(Exception $e)
    {
        echo "$e->getMessage()";
    }
?>