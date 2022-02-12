<?php

namespace Controllers;

  

class Cocktail extends AbstractController{


    protected $defaultModelName = "\Models\Cocktail";

    


    /**
     * 
     * affiche l'accueil des cocktails avec tous les cocktails
     * 
     * 
     * 
     */
    public function index(){


        $cocktails = $this->defaultModel->findAll();
        
        $pageTitle = 'Tout les cocktails';

        return $this->render("cocktails/index",compact('cocktails','pageTitle'));

    }

    /**
     * permet d'afficher un seul cocktail a partir de son ID
     * 
     * 
     */
    public function show(){


                
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){


        $id = $_GET['id'];} 


        if(!$id){
            die("Vous ne m'avez pas passé d'id");
        }


        
        $cocktail = $this->defaultModel->findById($id);



        $modelComment = new \Models\Comment();
        $commentaires = $modelComment->findAllCommentsByCocktail($id);


        $pageTitle = $cocktail->getNom();

            

        return $this->render("cocktails/show",compact('cocktail','commentaires','pageTitle'));
            


    }

    /**
     * Permet de creer un nouveau cocktail
     *
     */
    public function new(){

        $choixNomCocktail = null;
        $choixPhotoCocktail = null;
        $choixIngredientCocktail = null;

        if(!empty($_POST['choixNomCocktail']) && !empty($_POST['choixPhotoCocktail']) && !empty($_POST['choixIngredientCocktail'])){

            $choixNomCocktail = htmlspecialchars($_POST['choixNomCocktail']);
            $choixPhotoCocktail = htmlspecialchars($_POST['choixPhotoCocktail']);
            $choixIngredientCocktail = htmlspecialchars($_POST['choixIngredientCocktail']); 

        }

        if($choixNomCocktail &&
        $choixPhotoCocktail &&
        $choixIngredientCocktail){

            $cocktail = new \Models\Cocktail();            
            $cocktail->setNom($choixNomCocktail);
            $cocktail->setImage($choixPhotoCocktail);
            $cocktail->setIngredient($choixIngredientCocktail);

            $this->defaultModel->save($cocktail);

            return $this->redirect();

        }
        
        $pageTitle = "Nouveau Cocktail";

        return $this->render("cocktails/create",compact("pageTitle"));

        
       
    }


    /**
     * Permet de supprimer un cocktail
     * 
     * 
     */
    public function delete(){

        $id =null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id= $_POST['id'];}

        if(!$id){redirect('index.php');}

        
        $cocktail = $this->defaultModel->findById($id);

        $this->defaultModel->remove($cocktail);

        return $this->redirect();


    }



}















?>