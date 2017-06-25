<?php

require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';


class ControleurArticle
{

    private $article;
    private $commentaire;


    public
    function __construct()
    {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails sur un article

    /**
     * @param int $idArticle
     */
    public
    function article(
        $idArticle
    ) {
        $article = $this->article->getArticle($idArticle);
        $commentaires = $this->commentaire->getCommentaires($idArticle);
        $vue = new Vue("Article");
        $vue->generer(
            array ('article' => $article, 'commentaires' => $commentaires, "commentaireModele" => $this->commentaire)
        );
    }
}