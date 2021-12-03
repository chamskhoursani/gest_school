<?php

class Utilisateur {

    // Version propriétés privées
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $mot_de_passe;
    private $mobile;
    private $adresse;
    private $code_postal;

    // Dans data.php, new Article est instancié avec des arguments
    // De ce fait, la classe article doit avoir un constructeur
    // Afin de, correspondre à la syntaxe de $dataArticlesList
    public function __construct($id, $nom, $prenom, $mail, $mot_de_passe, $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->author = $author;
        $this->publish_date = $date;
        $this->category = $category;
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
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        if(is_string($title)) {
            $this->title = $title;
        }

        return $this;
    }

    /**
     * Get the value of body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     */
    public function setBody($body): self
    {
        if(is_string($body)) {
            $this->body = $body;
        }

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     */
    public function setAuthor($author): self
    {
        if(is_string($author)) {
            $this->author = $author;
        }

        return $this;
    }

    /**
     * Get the value of publish_date
     */
    public function getPublishDate()
    {
        return $this->publish_date;
    }

    /**
     * Set the value of publish_date
     */
    public function setPublishDate($publish_date): self
    {
        if(is_string($publish_date)) {
            $this->publish_date = $publish_date;
        }

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     */
    public function setCategory($category): self
    {
        if(is_string($category)) {
            $this->category = $category;
        }

        return $this;
    }

    
    // https://www.php.net/manual/fr/function.date.php
    public function getDateFr()
    {
        return date('d/m/y', strtotime($this->publish_date));
    }
}