<?php

require_once 'Modele/Article.php';
require_once 'Vue/Vue.php';

class ControleurAccueil
{

    private $article;

    public
    function __construct()
    {
        $this->article = new ArticleRepository();
    }

    // Affiche la liste des articles publiés
    public
    function accueil()
    {
        $articles = $this->article->getArticles();
        $vue = new Vue("Accueil");
        $vue->generer(array ('articles' => $articles));
    }

}