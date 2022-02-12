<?php

namespace Models;




class Cocktail extends AbstractModel{

    protected string $nomDeLaTable = "cocktails";

    protected $id;
    public function getId(){
    return $this->id;
    }


    protected $nom;
    public function getNom(){
    return $this->nom;
    }
    public function setNom($nom){
    $this->nom=$nom;
    }


    protected $image;
    public function getImage(){
    return $this->image;
    }
    public function setImage($image){
    $this->image=$image;
    }


    protected $ingredient;
    public function getIngredient(){
    return $this->ingredient;
    }
    public function setIngredient($ingredient){
    $this->ingredient = $ingredient;
    }


    /**
     * Permet de créer un cocktail
     * @param Cocktail $cocktail
     * return void
     */
    public function save(Cocktail $cocktail){

        $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (nom, image, ingredient) VALUES (:choixNomCocktail, :choixPhotoCocktail, :choixIngredientCocktail)");

        $requete->execute([

            'choixNomCocktail'=>$cocktail->nom, 
            
            'choixPhotoCocktail'=>$cocktail->image,
            
            'choixIngredientCocktail'=>$cocktail->ingredient


        ]);



    }

}











?>