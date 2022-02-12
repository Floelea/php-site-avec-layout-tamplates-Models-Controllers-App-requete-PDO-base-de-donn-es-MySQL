<?php   

namespace Models;

class Avis extends AbstractModel{

    public string $nomDeLaTable = "avis";

    private $id;
    public function getId(){
        return $this->id;
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

    private $pizza_id;
    public function getPizza_id(){
        return $this->pizza_id;
    }
    public function setPizza_id($pizza_id){
        $this->pizza_id=$pizza_id;
    }


public function findAllAvisByPizzaId(int $pizza_id){

    $requeteAvis = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} 
    WHERE pizza_id = :pizza_id");

    $requeteAvis ->execute ([

        "pizza_id" => $pizza_id

    ]);

    $avis = $requeteAvis->fetchAll(\PDO::FETCH_CLASS, get_class($this));

    return $avis;

    }



public function save($avis){

    $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} (author, content, pizza_id) VALUES ( :nomAuthor, :avisPizza, :pizza_id)");

    $requete->execute([

        "nomAuthor"=>$avis->author,
        "avisPizza"=>$avis->content,
        "pizza_id"=>$avis->pizza_id

    ]);

}

public function change(Avis $avis){

    $requete = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET content = :newInfo WHERE id = :idModifie");

        $requete->execute([

            "newInfo"=>$avis->content,
            "idModifie"=>$avis->id
        ]);


}


}


?>