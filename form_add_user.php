<?php 
    $title = 'Signup Form';
    include 'my_header.php'; 
?>
<?php
    include 'user_service.php';
    include 'error_service.php';
?>
<?php         
    $errors = array();
    $username = '';
    if(isset($_POST['userForm'])) {
        $errors = user_service_add_user();
    }
?>

<body>

<?php
//Display form errors
error_service_show_errors($errors);
?>

<br />
<div class="row">
    <div class="col-xs-6">
        <form action="form_add_user.php" method="post">
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