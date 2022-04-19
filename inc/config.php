<?php
    //if there is no constant defined called ___CONFIG___, do not load this file
    if(!defined('___CONFIG___')) {
        exit('You do not have a config file');
        
    }
    //our config below
    
    //include the DB.php file;
    include_once "classes/DB.php";

    $con = DB::getConnection();
?>