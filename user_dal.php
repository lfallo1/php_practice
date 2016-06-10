<?php

include 'connection.php';

function get_by_username($username){
    $connection = get_connection();
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

function add_user($username, $email, $password){
    $connection = get_connection();
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