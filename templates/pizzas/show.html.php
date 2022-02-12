<div>

        <h3>  <?=   $pizza->getName()   ?>      </h3>
        <img src="<?=   $pizza->getImage()   ?>" style="width:300px;"alt="">

</div>

<form action="?type=pizza&action=delete" method="post">

        <button type="submit" name="id" value="<?=   $pizza->getId()   ?>" class="btn btn-danger">Supprimer</button>

</form>


<h1>Commentaires</h1>


<form action="?type=avis&action=new" method="post">

    <input type="text" name="nameAvis" id="" placeholder="Votre nom">
    <input type="text" name="contentAvis" id="" placeholder="Votre avis">
    <button type="submit" name="pizzaId" value="<?=   $pizza->getId()   ?>" class="btn btn-success">Poster votre commentaire</button>



</form>


<?php   foreach ($avis as $avi) {   ?>

    <h3>  <?=   $avi->getAuthor()  ?>        </h3>
    <p>  <?=   $avi->getContent()  ?>     </p>

    <form action="?type=avis&action=delete" method="post">

            <button type="submit" name="id" value="<?=   $avi->getId()  ?>" class="btn btn-danger">Supprimer</button>

    </form>

    <a href="?type=avis&action=edit&id=<?=   $avi->getId()  ?>" class="btn btn-success">Modifier ce commentaire</a>



    <?php    }    ?>