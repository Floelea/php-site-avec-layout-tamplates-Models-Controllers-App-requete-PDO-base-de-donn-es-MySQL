<?php     

namespace Controllers;

class Info extends AbstractController{

    protected $defaultModelName = "\Models\Info";


    /**
     * 
     * affiche l'accueil des infos avec toutes les infos
     * 
     */
    public function index(){


        $infos = $this->defaultModel->findAll();
        
        $pageTitle = 'Toutes les infos';

        return $this->render("infos/index",compact('infos','pageTitle'));

    }

    /**
     * 
     * affiche une info
     */
    public function show(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }


        if(!$id){

            die("Vous ne m'avez pas passé d'ID");

        }

        $info = $this->defaultModel->findById($id);

        $modelReaction = new \Models\Reaction();
        $reactions = $modelReaction->findAllReactionById($id);

        return $this->render('infos/show',[
                                    'pageTitle'=> $info->getId(),
                                    'info'=>$info,
                                    'reactions'=>$reactions
        ]);

    }
/**
 * Permet d'effacer une info
 * 
 */
    public function delete(){

        $id=null;

        if (!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id = $_POST['id'];

        }

      
        if(!$id){

            return $this->redirect([

                'type'=>'info',
                'action'=>'index'

            ]);

        }

        if(!$this->defaultModel->findById($id)){

            return $this->redirect([

                                    'type'=>'info',
                                    'action'=>'index'

            ]);

        }

        $info = $this->defaultModel->findById($id);
        
        $this->defaultModel->remove($info);

        return $this->redirect([

                                    'type'=>'info',
                                    'action'=>'index'
        ]);

    }

    /**
     * Permet de creer une nouvelle info
     * 
     */
    public function new(){

        $newInfo = null;

        if(!empty($_POST['newInfo'])){

            $newInfo = htmlspecialchars($_POST['newInfo']);

        }

        if($newInfo){

            $info = new \Models\Info();
            $info->setContent($newInfo);

            $this->defaultModel->save($info);

            return $this->redirect([
                                            "type"=>"info",
                                            "action"=>"index"
            ]);

        }

        return $this->render("infos/create",[

                                            "pageTitle"=>"Creation d'une info"
        ]);


    }

    public function edit(){


        $idModifie = null;
        $newInfo = null;
        $id =null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id']) && !empty($_POST['newInfo'])){

            $idModifie = $_POST['id'];
            $newInfo = $_POST['newInfo'];
        }

        if($newInfo && $idModifie){


            $info = $this->defaultModel->findById($idModifie);
            
            $info->setContent($newInfo);

            
            
           

            $this->defaultModel->change($info);

            return $this->redirect([

                                    "type"=>"info",
                                    "action"=>"show",
                                    "id"=>$idModifie
            ]);

        }


        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

            return $this->redirect([

                                    "type"=>"info",
                                    "action"=>"index"
            ]); 

        }

        $info = $this->defaultModel->findById($id);


        return $this->render("infos/edit",[

            "pageTitle"=>$info->getId(),
            "info"=>$info
]);


    }
    

}




?>