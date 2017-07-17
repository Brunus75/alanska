<?php

namespace Alanska\Controleur;

use Alanska\Modele\Article;
use Vue;

class ControleurAccueil
{

    protected $article;

    public
    function __construct()
    {
        $this->article = new Article();
    }


    public
    function accueil()
    {
        $articles = $this -> article -> getArticles();
        $vue = new Vue("Accueil");
        $vue->generer(array ('articles' => $articles));
    }

}