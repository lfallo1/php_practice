<?php
    
    function validate_user_form($username, $email, $password){
        //setup varis
        $minimun = 5;
        $maximun = 10;
        $errors = array();

        //check length
        if(strlen($username) < $minimun ) {
           array_push($errors, "Username has to be longer than five");
        }  
        elseif(strlen($username) > $maximun  ) {
            array_push($errors, "Username cannot be longer than 10 ");
        }  

        //check password
        if(empty($password) || strlen($password) < 8){
            array_push($errors, "Password must be atleast 8 characters");
        }
        return $errors;
    }
?>