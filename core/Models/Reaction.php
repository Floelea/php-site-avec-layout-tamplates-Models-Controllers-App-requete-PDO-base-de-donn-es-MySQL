<?php    

namespace Models;

class Reaction extends AbstractModel{

    protected string $nomDeLaTable = "reactions";


    private $id;
    public function getId(){
    return $this->id;
    }


    private $info_id;
    public function getInfo_id(){
    return $this->info_id;
    }

    
    private $author;
    public function getAuthor(){
    return $this->author;
    }
    public function setAuthor($author){
    $this->author=$author;
    }


    private $content;
    public function getContent(){
    return $this->content;
    }
    public function setContent($content){
    $this->content=$content;
    }



    public function findAllReactionById(int $id){

        $requete = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} 
        WHERE info_id = :info_id");

        $requete->execute([

            'info_id'=>$id
        ]);

        $elements = $requete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $elements;

    }

    public function findById(int $id){

   
        $requete = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} WHERE id = :id");
    
        $requete->execute([
    
        "id"=>$id
    
    
        ]);
    
    
        $elements = $requete->fetch();
    
        return $elements;
    
    }


}




?>