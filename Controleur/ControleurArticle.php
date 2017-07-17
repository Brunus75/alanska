<?php

namespace Alanska\Controleur;

use Alanska\Modele\Article;
use Alanska\Modele\Commentaire;
use Vue;

class ControleurArticle extends Controleur
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
     * @param int $art_id
     */
    public
    function article($art_id) {
        $article = $this-> article ->getArticle($art_id);
        $commentaires = $this-> commentaire ->getCommentaires($art_id);
        $vue = new Vue("Article");
        $vue->generer(
            array ('ArticleRepository' => $article, 'commentaires' => $commentaires, "commentaireModele" => $this->commentaire)
        );
    }
}