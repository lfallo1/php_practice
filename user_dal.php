<?php

include 'connection.php';

function user_dal_get_by_username($username){
    global $connection;
    $user = NULL;
    if($connection && $stmt = $connection->prepare("select * from user where username = ? limit 1")){
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $user = $result->fetch_assoc();
    }
    return $user;
}

function user_dal_get_by_id($id){
    global $connection;
    $user = NULL;
    if($connection && $stmt = $connection->prepare("select * from user where id = ? limit 1")){
        $stmt->bind_param("i",$id);
        
        //returns true or false
        $result = $stmt->execute();
        console_log($result);
        if($result){
            
            //gets the result of the statement
            $result = $stmt->get_result();
            console_log($result);
            $stmt->close();
            
            //gets record at cursor (can use this in a while loop to get all, but we only need the first)
            $user = $result->fetch_assoc();
            console_log($stmt);
            console_log($result);
            console_log($user);   
        }
    }
    return $user;
}

function user_dal_get_users(){
    global $connection;
    $users = NULL;
    if($connection && $stmt = $connection->prepare("select * from user")){
        $success = $stmt->execute();
        if($success){
            
            //gets the result set (not exactly a list, but a result set that can be looped over... i.e., while cursor has next row)
            $users = $stmt->get_result();
            console_log($users);
        }
    }
    return $users;
}

function user_dal_update_user($username, $email, $password, $id){
    global $connection;
    $updated = false;
    
    //if $connection and $stmt->prepare...  return true then continue
    if($connection && $stmt = $connection->prepare('update user set username = ?, email = ?, password = ? where id = ?')){
        $stmt->bind_param("sssi", $username, $email, $password, $id);
        
        //returns true or false
        $result = $stmt->execute();
        console_log($result);
        if($result){
            $updated = true;
            console_log($stmt);
        }
        else{
            echo 'statement jacked';
        }
        $stmt->close();
    }
    return $updated;
}

function user_dal_add_user($username, $email, $password){
    global $connection;
    $inserted = -1;
    if($connection && $stmt = $connection->prepare("INSERT INTO user (username, email, password) VALUES(?,?,?)")){
        $stmt->bind_param("sss", $username, $email, $password);
        
        //returns true or false
        $result = $stmt->execute();
        console_log($result);
        if($result){
            
            //returns the last inserted id
            $inserted = $stmt->insert_id;
            console_log($inserted);
            echo 'inserted id#' . $inserted;  
        }
        else{
            echo 'could not insert record';
        }
        $stmt->close();
    } 
    else{
        echo 'statement is jacked up';
    }
    return $inserted;
}

?>