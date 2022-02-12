<?php   

namespace Controllers;

class Avis extends AbstractController{

    protected $defaultModelName = "\Models\Avis";

    public function new(){

        $nameAvis=null;
        $contentAvis=null;
        $pizzaId = null;

        if(!empty($_POST['nameAvis']) && !empty($_POST['contentAvis']) && !empty($_POST['pizzaId']) && ctype_digit($_POST['pizzaId'])){

            $nameAvis=htmlspecialchars($_POST['nameAvis']);
            $contentAvis=htmlspecialchars($_POST['contentAvis']);
            $pizzaId = $_POST['pizzaId'];
        }

        if(!$nameAvis || !$contentAvis || !$pizzaId){

            die("Le formulaire est mal rempli");

        }

        $modelPizza = new \Models\Pizza();
        $pizza = $modelPizza->findById($pizzaId);

        $avis = new \Models\Avis();
        $avis->setAuthor($nameAvis);
        $avis->setContent($contentAvis);
        $avis->setPizza_id($pizzaId);


        $this->defaultModel->save($avis);

        

        return $this->redirect([

                                "pageTitle"=>$pizza->getName(),
                                "type"=>"pizza",
                                "action"=>"show",
                                "id"=>$pizza->getId()


        ]);
    }

    public function delete(){

        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id = $_POST['id'];

        }

        if(!$id){

            die("pas d'ID valable");

        }

        $avis = $this->defaultModel->findById($id);

        if(!$avis){

            return $this->redirect();

        }

        $this->defaultModel->remove($avis);

        return $this->redirect([

                                "type"=>"pizza",
                                "action"=>"index"
                             
        ]);

    }

    public function edit(){

        $id = null;
        $newInfo = null;
        $idEdit = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id']) && !empty($_POST['newInfo'])){

            $idEdit = $_POST['id'];
            $newInfo = $_POST['newInfo'];

        }

        if($idEdit && $newInfo){

            $avis = $this->defaultModel->findById($idEdit);

            $avis->setContent($newInfo);

            $this->defaultModel->change($avis);

            return $this->redirect();

        }



        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

            die("vous ne m'avez pas passé d'ID");

        }

        $avi = $this->defaultModel->findById($id);

        return $this->render("pizzas/edit",[

                                            "avi"=>$avi
        ]);

    }
}


?>