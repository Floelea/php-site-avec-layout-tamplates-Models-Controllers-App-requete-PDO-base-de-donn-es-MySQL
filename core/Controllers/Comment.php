<?php     


namespace Controllers;





class Comment extends AbstractController{

    protected $defaultModelName = "\Models\Comment";

  

    /**
     * Permet de creer un nouveau commentaire a partir de l'ID du cocktail
     * @return Response
     */
    public function new():Response{

        $author = null ;
        $content = null ; 
        $cocktail_id = null ;

        if(!empty($_POST['author']) && !empty($_POST['comment']) && !empty($_POST['cocktailId']) && ctype_digit($_POST['cocktailId'])){

            $author = htmlspecialchars($_POST['author']);
            $content = htmlspecialchars($_POST['comment']);
            $cocktail_id = $_POST['cocktailId'];


        }

        if(!$author || !$content || !$cocktail_id){

            die('formulaire mal rempli');

        }

        $modelCocktail = new \Models\Cocktail();
        $cocktail = $modelCocktail->findById($cocktail_id);
        
        

        $comment = new \Models\Comment();
        $comment->setAuthor($author);
        $comment->setComment($content);
        $comment->setCocktailId($cocktail_id);

       
        $this->defaultModel->save($comment);

        return $this->redirect();
    


    }


    /**
     * Permet de supprimer un commentaire 
     * @return Response
     */
public function delete():Response{
    

        
    $id = null;

    if(!empty($_POST['id']) && ctype_digit($_POST['id'])){


        $id = $_POST['id'];

    }

    
    if(!$id){

        die("pas d'id valable");
    };

    

    
    $comment = $this->defaultModel->findById($id);








    if(!$comment){

        return $this->redirect();
        

    };


    
    $this->defaultModel->remove($comment);


    

    return $this->redirect();
    



    }



}






?>