<form action="?type=info&action=edit" method="post">


            <div class="form-group">
                    <label class="col-form-label mt-4" for="inputDefault">Renseignez votre info</label>
                    <input type="text" name="newInfo" value="<?=  $info->getContent() ?>" class="form-control" placeholder="Votre info" id="inputDefault">
                    <button type="submit" name="id" value="<?=  $info->getId() ?>"class="btn btn-success">Modifier votre info</button>
            </div>
        

</form>