<div>
        
        <h3><?= $cocktail->getNom()  ?></h3>
        
        <img src="<?= $cocktail->getImage() ?>" alt="">

        <p><?= $cocktail->getIngredient()  ?></p>
        
        <form action="?type=cocktail&action=delete" method="post">

            <button type="submit" name="id" value="<?= $cocktail->getId() ?>" class="btn btn-danger">SUPPRIMER</button>

        </form> 

       

</div>


        <form action="?type=comment&action=new" method="post">


            <div class="form-group">
                    <label class="col-form-label mt-4" for="inputDefault">Indiquez votre nom</label>
                    <input type="text" name="author" class="form-control" placeholder="Default input" id="inputDefault">
            </div>

            <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Votre commentaire</label>
                    <textarea class="form-control" name="comment" id="exampleTextarea" rows="3"></textarea>
            </div>


                    <button type="submit" class="btn btn-primary mt-4 mb-4" name="cocktailId" value="<?= $cocktail->getId() ?>" >Poster votre commentaire</button>       




        </form>



            <?php  foreach ($commentaires as $commentaire) { ?>


    <div>

            <h4><?= $commentaire->getAuthor()   ?></h4>
            <p><?= $commentaire->getComment()   ?></p>
            
            <form action="?type=comment&action=delete" method="post">

            <button type="submit" class="btn btn-danger" name="id" value="<?= $commentaire->getId()   ?>" >SUPPRIMER</button>

            </form>


    </div>


            <?php      }        ?>