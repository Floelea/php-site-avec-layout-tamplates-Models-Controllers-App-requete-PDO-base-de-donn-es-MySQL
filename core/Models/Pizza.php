<?php     

namespace Models;


class Pizza extends AbstractModel{

    protected string $nomDeLaTable = "pizzas";

    protected $id;
    public function getId(){
        return $this->id;
    }

    protected $name;
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }

    protected $image;
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    }


    public function save(Pizza $pizza){

        $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (name, image) VALUES (:namePizza, :imagePizza)");

        $requete->execute([

            'namePizza'=>$pizza->name, 
            
            'imagePizza'=>$pizza->image
            
            
        ]);

    }


}


?>