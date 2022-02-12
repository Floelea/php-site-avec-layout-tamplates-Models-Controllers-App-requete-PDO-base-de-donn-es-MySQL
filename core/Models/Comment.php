<?php    

namespace Models;



class Comment extends AbstractModel{

    protected string $nomDeLaTable = "comments";

    protected $id;
    public function getId(){
    return $this->id;
    }


    protected $cocktail_id;
    public function getCocktailId(){
    return $this->cocktail_id;
    }
    public function setCocktailId($cocktail_id){
    $this->cocktail_id=$cocktail_id;
    }


    protected $author;
    public function getAuthor(){
    return $this->author;
    }
    public function setAuthor($author){
    $this->author=$author;
    }


    protected $comment;
    public function getComment(){
    return $this->comment;
    }
    public function setComment($comment){
    $this->comment=$comment;
    }


/**
 * permet de trouver tout les commentaires d'un cocktail par son ID
 * renvoi un tableau de commentaires
 * 
 * @param int @cocktail_id
 * @return array|bool
 */
public function findAllCommentsByCocktail(int $cocktailId){

    

    $maRequetePourDesCommentaires = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} 
    WHERE cocktail_id = :cocktail_id");

    $maRequetePourDesCommentaires ->execute ([

        "cocktail_id" => $cocktailId

    ]);

    $commentaires = $maRequetePourDesCommentaires->fetchAll(\PDO::FETCH_CLASS, get_class($this));

    return $commentaires;


}

// function saveComment()


/**
* 
* permet d'enregister dans la BDD un commentaire 
* 
* @param Comment $comment 

* @return void
*/
public function save($comment):void{


    $requeteCreationComment = $this->pdo->prepare("INSERT INTO comments (author, comment, cocktail_id) VALUES ( :nomAuthor, :commentCocktail, :id_cocktail)");

    $requeteCreationComment->execute([

     "nomAuthor"=>$comment->author,
     "commentCocktail"=>$comment->comment,
     "id_cocktail"=>$comment->cocktail_id
     
]);


}



}





?>