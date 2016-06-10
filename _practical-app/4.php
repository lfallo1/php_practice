<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
		
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php  

/*  Step1: Define a function and make it return a calculation of 2 numbers

	Step 2: Make a function that passes parameters and call it using parameter values


 */
    
    function add($a,$b){
        echo 'in function::add(a,b) <br />';
        return $a + $b;
    }
    
    $a = 17;
    $b = 99;
    define('DOG', "dog");
    echo 'result of add('. $a .','. $b .') is ' . add($a, $b) . '<br />';

    
    echo DOG;
	
?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php" ?>