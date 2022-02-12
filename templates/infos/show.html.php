<div>
        
        <h3><?= $info->getContent()  ?></h3>

        <form action="?type=info&action=delete" method="post">

                <button type="submit" name="id" value="<?= $info->getId()  ?>" class="btn btn-danger">Supprimer</button>

        </form>

       <a href="?type=info&action=edit&id=<?= $info->getId() ?>" class="btn btn-success">Modifier</a>

</div>

<h3>Commentaires :</h3>

<?php   foreach($reactions as $reaction) {     ?>


    <h4><?=   $reaction->getAuthor()   ?>     </h4>
    <h5><?=   $reaction->getContent()   ?>     </h5>

    <form action="?type=reaction&action=delete" method="post">

            <button type="submit" name="id" value="<?=   $reaction->getId()   ?>" class="btn btn-danger">Supprimer</button>

    </form>


<?php    }    ?>
