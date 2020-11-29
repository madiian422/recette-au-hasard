<?php
class recette{

    private $id;
    private $nom_recette;
    private $ingredients;
    private $description;


    public function __construct()
    {

    }
    public function __ToString()
    {

    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of nom_recette
     */
    public function getNom_recette()
    {
        return $this->nom_recette
    }

    /**
     * Set the value of nom_recette
     *
     * @return  self
     */
    public function setNom_recette($nom_recette)
    {
        $this->nom_recette = $nom_recette;

        return $this;
    }
    /**
     * Get the value of ingredients
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set the value of ingredients
     *
     * @return  self
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }
    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}

?>