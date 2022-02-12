<?php   

namespace Models;

class Info extends AbstractModel{

    protected string $nomDeLaTable = 'infos';

    private $id;
    public function getId(){
    return $this->id;
    }

    private $content;
    public function getContent(){
    return $this->content;
    }
    public function setContent($content){
    $this->content=$content;
    }




    /**
     * Permet de créer une info 
     * @param Info @info
     * return void
     */
    public function save(Info $info){

        $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (content) VALUES (:newInfo)");

        $requete->execute([

            "newInfo"=>$info->content

        ]);
    }

    /**
     * Permet de modifier une info avec son iD
     * 
     */
    public function change(Info $info){

        $requete = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET content = :newInfo WHERE id = :idModifie");

        $requete->execute([

            "newInfo"=>$info->content,
            "idModifie"=>$info->id
        ]);

    }

}



?>