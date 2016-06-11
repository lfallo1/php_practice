<?php
    $title = 'Update User';
    include 'my_header.php' 
?>
<?php
    include 'user_service.php';
    include 'error_service.php';
?>
<?php
    $success = false;
    $errors = array();
    $username = NULL;
    $email = NULL;
    $id = NULL;
    $password = NULL;
    if(isset($_GET['id'])){
        $user = user_service_get_by_id($_GET['id']);
        if($user){
            $username = $user['username'];
            $email = $user['email'];
            $password = $user['password'];   
        }
    }
    elseif(isset($_POST['userForm'])) {
        $errors = user_service_update_user();
    }
?>
<body>
   
   <?php
    
    //show any form errors
    error_service_show_errors($errors);
    
    ?>
   
    <form action="form_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
        <input type="text" name="username" class="form-control" value="<?php echo $username?>" />
        <input type="text" name="email" class="form-control" value="<?php echo $email ?>" />
        <input type="password" name="password" class="form-control" value="<?php echo $password ?>" />
        <input type="submit" class="form-control btn btn-primary" name="userForm" value="update" />
    </form>
    
</body>
</html>