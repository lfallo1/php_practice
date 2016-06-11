<?php
    include 'user_dal.php';
    include 'form_process.php';
?>
<?php 
    $title = 'Signup Form'
    include 'my_header.php' 
?>

<body>
   <?php     
    
    
    
    $errors = array();
    $username = '';
    if(isset($_POST['userForm'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = validate_user_form($username, $email, $password);

        //if form valid, try to submit to database
        if(count($errors) === 0){
            $existing = get_by_username($username);
            if($existing){
                console_log($existing);
                array_push($errors, "That username is already taken");
            }
            else{
                if(!add_user($username, $email, $password)){
                    array_push($errors, "Unable to add user");
                }
            }
        }
        else{
            echo 'Please correct errors on form';
        }
    }

//Display errors

    if(!empty($errors)){ ?>
        <ul class="list-group">
            <?php
                foreach($errors as $err){
                    echo '<li class="list-group-item text-danger">'. $err .'</li>';
                }   
            ?>
        </ul>
<?php
}
?>
<br />
<div class="row">
    <div class="col-xs-6">
        <form action="form_html.php" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Enter Username" value="<?php echo $username ?>" />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Enter Email" />
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary" type="submit" name="userForm">
            </div>
        </form>
    </div>
</div>



</body>

</html>