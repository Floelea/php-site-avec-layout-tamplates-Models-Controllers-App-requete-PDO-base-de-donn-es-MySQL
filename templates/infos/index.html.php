<?php    foreach ($infos as $info) {   ?>


    <h3>    <?= $info->getContent()  ?>    </h3>

    <a href="?type=info&action=show&id=<?= $info->getId()   ?>"class="btn btn-info mb-5">Voir cette info</a>


<?php     }    ?>
