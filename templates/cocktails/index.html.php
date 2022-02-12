<?php     foreach ($cocktails as $cocktail) {  ?>

    
        

        <div>
        
        <h3><?= $cocktail->getNom()  ?></h3>
        
        <img style="width:500px;" src="<?= $cocktail->getImage() ?>" alt="">

        <p><?= $cocktail->getIngredient()  ?></p>
        
        <a href="?type=cocktail&action=show&id=<?= $cocktail->getId()  ?>" class="btn btn-success" >VOIR CE COCKTAIL</a>
         
        </div>



   <?php   }    ?>









