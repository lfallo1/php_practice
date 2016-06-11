<?php

include 'connection.php';

function get_by_username($username){
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

function get_by_id($id){
    global $connection;
    $user = NULL;
    if($connection && $stmt = $connection->prepare("select * from user where id = ? limit 1")){
        $stmt->bind_param("s",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $user = $result->fetch_assoc();
        console_log($stmt);
        console_log($result);
        console_log($user);
    }
    return $user;
}

function get_users(){
    global $connection;
    $users = NULL;
    if($connection && $stmt = $connection->prepare("select * from user")){
        $success = $stmt->execute();
        if($success){
            $users = $stmt->get_result();
            console_log($users);
        }
        
    }
    return $users;
}

function update_user($username, $email, $password, $id){
    global $connection;
    $updated = false;
    if($connection && $stmt = $connection->prepare('update user set username = ?, email = ?, password = ? where id = ?')){
        $stmt->bind_param("sssi", $username, $email, $password, $id);
        $result = $stmt->execute();
        console_log($result);
        if($result){
            $updated = true;
            console_log($stmt);
            console_log($updated);
        }
        else{
            echo 'statement jacked';
        }
        $stmt->close();
    }
    return $updated;
}

function add_user($username, $email, $password){
    $inserted = -1;
    if($connection && $stmt = $connection->prepare("INSERT INTO user (username, email, password) VALUES(?,?,?)")){
        $stmt->bind_param("sss", $username, $email, $password);
        $result = $stmt->execute();
        console_log($result);
        if($result){
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