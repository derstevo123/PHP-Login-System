<?php 
     //Allow the config
     define('___CONFIG___', true);
     //require the config
     require_once "../inc/config.php";
     //allways return json format
     
     
     if($_SERVER['REQUEST_METHOD'] == 'POST') {
         header('Content-Type: application/json');
         $return = [];
 
         $email = Filter::String( $_POST['email'] );
         $password = $_POST['password'];
         
         //make sure the user does not exist//try and sign them in
         $findUser = $con->prepare("SELECT user_id , password FROM users WHERE email = LOWER(:email) LIMIT 1");
         $findUser ->bindParam(':email', $email, PDO::PARAM_STR);
         $findUser->execute();
 
         if($findUser->rowCount() == 1) {
             // User exists
             $User = $findUser->fetch(PDO::FETCH_ASSOC);
             $user_id = (Int) $User['user_id'];
             $hash = $User['password'];

             if(password_verify($password,$hash)) {
                $return['redirect'] = '/dashboard.php';
                $_SESSION['user_id'] = $user_id;

             }

         }  else {
             //they need to create an account
             $return['error'] = "you need to create an account. <a href='/register.php'>sign up now?</a>";
         }
           
        
         
         //make sure the user can be and is added 
 
         //return the proper information 
        
         
         echo json_encode($return, JSON_PRETTY_PRINT); exit;
     }else{
         exit('Invalid URL');
     } 




?>