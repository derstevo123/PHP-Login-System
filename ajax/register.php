<?php 
    //Allow the config
    define('___CONFIG___', true);
    //require the config
    require_once "../inc/config.php";
    //allways return json format
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' or 1 ===1) {
        header('Content-Type: application/json');
        $return = [];

        $email = Filter::String( $_POST['email'] );
        
        //make sure the user does not exist
        $findUser = $con->prepare("SELECT user_id FROM users WHERE email = LOWER(:email) LIMIT 1");
        $findUser ->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if($findUser->rowCount() == 1) {
            // User exists
            $return['error'] = "you allready have an account";
            $return['is_logged_in'] = false;
        } else {
            // User does not exist, add them now.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			
			$addUser = $con->prepare("INSERT INTO users(email, password) VALUES(LOWER(:email), :password)");
			$addUser->bindParam(':email', $email, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			
			$addUser->execute();

           
            $user_id = $con->lastInsertId();
            $_SESSION['user_id'] = (int) $user_id;

            $return['redirect'] = "/dashboard.php?message=Welcome";
            $return['is_logged_in'] = true;
        }
        //make sure the user can be and is added 

        //return the proper information 
       
        
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    }else{
        exit('Invalid URL');
    } 
     
?>