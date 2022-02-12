<?php   

namespace Controllers;

class Reaction extends AbstractController{

    protected $defaultModelName = "\Models\Reaction";





    public function delete(){

        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id = $_POST['id'];

        }

        if(!$id){

           die("Cet ID n'existe pas");

        }

        $reaction = $this->defaultModel->findById($id);

        if(!$reaction){

            die("Ce commentaire n'existe pas");

        }

        $idInfo = $reaction->info_id;

        $this->defaultModel->remove($reaction->id);

        return $this->redirect([

                                "type"=>"info",
                                "action"=>"show",
                                "id"=> $idInfo

        ]);
    }

}




?>