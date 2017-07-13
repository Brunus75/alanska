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
        $this->article = new ArticleRepository();
        $this->commentaire = new CommentaireRepository();
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
            array ('ArticleRepository' => $article, 'commentaires' => $commentaires, "commentaireModele" => $this->commentaire)
        );
    }
}