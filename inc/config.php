<?php
    //if there is no constant defined called ___CONFIG___, do not load this file
    if(!defined('___CONFIG___')) {
        exit('You do not have a config file');
        
    }
    //our config below
    //allow errors
        error_reporting(-1);
        ini_set('display_errors', 'On');
    //include the DB.php file;
    
   include_once "classes/DB.php";
   include_once "classes/Filter.php";
    $con = DB::getConnection();
?>