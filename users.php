<?php $title = 'Users Table' ?>
<?php include 'my_header.php' ?>
<?php include 'user_service.php'; ?>
<body>
<?php
    $result = user_service_get_users();
?>
    
    <ul class="list-group">
    <?php
    while($user = mysqli_fetch_assoc($result)){
        ?>
        <li class="list-group-item">
            <?php echo $user["username"] . ' - ' . $user["email"] ?>
        </li>
    <?php
    } ?>
    </ul>
    
</body>
</html>