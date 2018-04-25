<?php

class Post
{

    //Liste des propriétés
    private $_id;
    private $_title;
    private $_content;
    private $_post_date;


    // Constructeur
    public function __construct($data)
    {
        $this->hydrate($data);
    }


    // Méthode d'hydratation
    public function hydrate($data)
    {
        foreach ($data as $key => $value)
        {

        // On récupère le nom du setter correspondant à l'attribut
        $method = 'set'.ucfirst($key);  

            // Si le setter correspondant existe
            if (method_exists($this, $method))
            {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }


    //Liste des getters
    public function id() { return $this->_id; }
    public function title() { return $this->_title; }
    public function content() { return $this->_content; }
    public function post_date() { return $this->_post_date; }


    //Liste des setters
    public function setId($id)
    {
        $this->_id = (int) $id;
    }

    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setPost_date($post_date)
    {
        if ($post_date instanceof DateTime) {
            $this->_post_date = $post_date;
        }
    }
}