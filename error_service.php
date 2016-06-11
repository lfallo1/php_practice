<?php

function error_service_show_errors($errors){
    if(!empty($errors) && count($errors) > 0){
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
}

?>