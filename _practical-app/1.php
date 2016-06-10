<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">
		
<?php
    
    $user = array('name' => 'lance', 'id' => 29);
    
    print_r($user);
    
    ?>

		<h1>
           <?php
            //I'm just saying hello
             echo 'Hello' 
            ?>
        </h1>

	

		</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>