<?php     foreach ($pizzas as $pizza) {     ?>
<div class="">
    <h3> <?=   $pizza->getName()  ?>     </h3>
    <img src="<?=   $pizza->getImage()   ?>  " style="width:400px;" alt="">    
</div>
<a href="?type=pizza&action=show&id=<?=   $pizza->getId()   ?>" class="btn btn-warning mb-5">Voir cette pizza</a>

 <?php    }    ?>
