<?php $title = 'Users Table' ?>
<?php include 'my_header.php' ?>

<body>
    <?php
    include 'user_dal.php';
    $result = get_users();
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