<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

	<section class="content">

		<aside class="col-xs-4">

	<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		<article class="main-content col-xs-8">
		


		<?php

		/* Step 1: Make 2 variables called number1 and number2 and set 1 to value 10 and the other 20:

		  Step 2: Add the two variables and display the sum with echo:


		  Step3: Make 2 Arrays with the same values, one regular and the other associative

		  Step4: Make a constant and set it to the value of PHP. and use an echo to print it out


			

			 */

		    $number1 = 10;
            $number2 = 21;
            
            $res = $number1 + $number2;
            echo $res < 50 ? $res . " is less than 50<br />" : $res . " is atleast 50<br />";
            $isEven = $res %2 === 0;
            $alertClass = $isEven ? 'alert alert-success' : 'alert alert-danger';
            ?>
            
            <div class="<?php echo $alertClass ?>">
            <?php
            switch($res){
                case 30:
                    echo 'its 30';
                    break;
                case 31:
                    echo 'its 31<br/>';
                    break;
                default:
                    echo 'its not 30 or 31';
                    break;
            }
            ?>
            </div>
//            if($res % 2 == 0){
//                echo $res % 2 == 0 ? $res . " is even<br />" : $res . " is odd<br />";    ;    
//            }
//            else{
//                echo $res . " is odd<br />";    
//            }
            
            $arr1 = array(10);
            $arr2 = array('val' => 10);
            $PHP = 'PHP';
            
            echo $PHP


		?>

	

		</article><!--MAIN CONTENT-->

<?php include "includes/footer.php" ?>