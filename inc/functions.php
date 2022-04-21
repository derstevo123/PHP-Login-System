<?php
    function ForceLogin (){
        if(!isset($_SESSION['user_id'])) {
            header("location: /login.php");
    
            }
        }
    function ForceDashboard (){
        if(isset($_SESSION['user_id'])) {
            header("location: /dashboard.php");
        }
    }
?>