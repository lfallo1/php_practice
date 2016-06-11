<?php
    include 'user_dal.php';
    include 'form_process.php';
?>
<?php
    $title = 'Update User';
    include 'my_header.php' 
?>
<?php
    $success = false;
    $errors = array();
    $username = NULL;
    $email = NULL;
    $id = NULL;
    $password = NULL;
    if(isset($_GET['id'])){
        echo '<br />GET PARAM: ' . $_GET['id'] . '<br />';
        $id = $_GET['id'];
        $user = get_by_id($id);
        $id = $user['id'];
        $username = $user['username'];
        $email = $user['email'];
        $password = $user['password'];
    }
    elseif(isset($_POST['userForm'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = validate_user_form($username, $email, $password);

        //if form valid, try to submit to database
        if(count($errors) === 0){
            if(!update_user($username, $email, $password, $id)){
                array_push($errors, "Unable to add user");
            }
        }
        if(count($errors) > 0){
            $user = array('username'=>$username, 'email'=>$email);
        }
        else{
            $success = true;
        }
    }
?>
<body>
   
   <?php
    if($success){
        $username = NULL;
        $email = NULL;
        $id = NULL;
        $password = NULL;
        ?>
        
        <div class="alert alert-success"><?php echo 'Record has been updated!' ?></div>
        
        <?php
    }
    if($errors){
        ?>
        
        <ul class="list-group">
        
        <?php 
            foreach($errors as $e){
            ?>    
                
                <li class="list-group-item text-danger">
                    <?php echo $e ?>
                </li>
                
        <?php
            }
        ?>
        
        </ul>
        
        <?php
    }
    
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