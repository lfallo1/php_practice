<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>

<body>
   <?php     
    
    include 'user_dal.php';
    
    $username = '';
    if(isset($_POST['newUser'])) {
        
        //setup varis
        $minimun = 5;
        $maximun = 10;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $errors = array();
        $valid = true;

        //check length
        if(strlen($username) < $minimun ) {
           $valid = false;
           array_push($errors, "Username has to be longer than five");
        }  
        elseif(strlen($username) > $maximun  ) {
            $valid = false;
            array_push($errors, "Username cannot be longer than 10 ");
        }  

        //check password
        if(empty($password) || strlen($password) < 8){
            $valid = false;
            array_push($errors, "Password must be atleast 8 characters");
        }

        //if form valid, try to submit to database
        if($valid){
            $existing = get_by_username($username);
            if($existing){
                console_log($existing);
                $valid = false;
                array_push($errors, "That username is already taken");
            }
            else{
                if(!add_user($username, $email, $password)){
                    $valid = false;
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
                <input class="form-control btn btn-primary" type="submit" name="newUser">
            </div>
        </form>
    </div>
</div>



</body>

</html>