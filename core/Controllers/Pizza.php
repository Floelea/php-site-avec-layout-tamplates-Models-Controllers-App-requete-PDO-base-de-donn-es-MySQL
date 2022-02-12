<?php     

namespace Controllers;


class Pizza extends AbstractController{

    protected $defaultModelName = "\Models\Pizza";


    public function index(){

        $pizzas = $this->defaultModel->findAll();

        return $this->render("pizzas/index",[

                                              'pageTitle'=>'Nos pizzas' ,
                                              'pizzas'=>$pizzas 
        ]);


    }

    public function show(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

            die("pas d'id");

        }

        $pizza = $this->defaultModel->findById($id);

        $modelAvis = new \Models\Avis();

        $avis = $modelAvis->findAllAvisByPizzaId($id);


        return $this->render("pizzas/show",[

                                            "pageTitle"=>$pizza->getName(),
                                            "pizza"=>$pizza,
                                            "avis"=>$avis
        ]);



    }

    public function delete(){

        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id=$_POST['id'];


        }


        if(!$id){

            die("Vous n'avez pas passé d'id");

        }

        $pizza = $this->defaultModel->findById($id);

        $this->defaultModel->remove($pizza);

        return $this->redirect();

    }

    public function new(){

        $nomNewPizza = null;
        $imageNewPizza = null;

        if(!empty($_POST['nomNewPizza']) && !empty($_POST['imageNewPizza'])){

            $nomNewPizza = htmlspecialchars($_POST['nomNewPizza']);
            $imageNewPizza = htmlspecialchars($_POST['imageNewPizza']);

        }

        if($nomNewPizza && $imageNewPizza ){

            $pizza = new \Models\Pizza();
            $pizza->setName($nomNewPizza);
            $pizza->setImage($imageNewPizza);

            $this->defaultModel->save($pizza);

            return $this->redirect([

                                    "type"=>"pizza",
                                    "action"=>"index"
            ]);

        }

        return $this->render("pizzas/create",[

                                            "pageTitle"=>"Creation"

        ]);



    
    }




    }

?>