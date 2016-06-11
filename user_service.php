<?php

    include 'user_dal.php';

    function user_service_get_users(){
        return user_dal_get_users();
    }

    function user_service_add_user(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = user_service_validate_user_form($username, $email, $password);

        //if form valid, try to submit to database
        if(count($errors) === 0){
            $existing = user_dal_get_by_username($username);
            if($existing){
                console_log($existing);
                array_push($errors, "That username is already taken");
            }
            else{
                if(!user_dal_add_user($username, $email, $password)){
                    array_push($errors, "Unable to add user");
                }
            }
        }
        else{
            echo 'returning errors: ' . print_r($errors);
            return $errors;
        }
    }

    function user_service_validate_user_form($username,     $email, $password){
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
//        echo 'returning errors: ' . print_r($errors);
        return $errors;
    }

    function user_service_update_user(){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = user_service_validate_user_form($username, $email, $password);

//        echo 'updating user <br />';
//        echo print_r($errors);
        //if form valid, try to submit to database
        if(count($errors) === 0){
            if(!user_dal_update_user($username, $email, $password, $id)){
                array_push($errors, "Unable to add user");
            }
        }
        
        if(count($errors) > 0){
            return $errors;
        }
    }

    function user_service_get_by_id($id){
        return user_dal_get_by_id($id);
    }
?>