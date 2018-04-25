<?php

class Comment
{

	//Liste des propriétés
    private $_id;
    private $_post_id;
    private $_user_id;
    private $_content;
    private $_comment_date;
    private $_report;

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
    public function post_id() { return $this->_post_id; }
    public function user_id() { return $this->_user_id; }
    public function content() { return $this->_content; }
    public function comment_date() { return $this->_comment_date; }
    public function report() { return $this->_report; }


    //Liste des setters
    public function setId($id)
    {
        $this->_id = (int) $id;
    }

    public function setPost_id($post_id)
    {
       	$this->_post_id = (int) $post_id;
    }

    public function setUser_id($user_id)
    {
       	$this->_user_id = (int) $user_id;
    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setComment_date($comment_date)
    {
        if ($comment_date instanceof DateTime) {
            $this->_comment_date = $comment_date;
        }
    }

    public function setReport($report)
    {
       	$this->_report = (int) $report;
    }

}