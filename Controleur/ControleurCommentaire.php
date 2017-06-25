<?php

require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';


class ControleurCommentaire
{

    private $article;
    private $commentaire;


    public function __construct()
    {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

    // Affiche les détails d'un commentaire sur une nouvelle page
    /**
     * @param int $idCommentaire
     */
    public function commentaire($idCommentaire)
    {
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        $vue = new Vue("Commentaire");
        $vue->generer(array('commentaire' => $commentaire));
    }


    // Ajoute un commentaire à un article
    /**
     * @param string $com_author
     * @param string $contenu
     * @param int $idArticle
     */
    public function commenter($com_author, $contenu, $idArticle)
    {
        // Test les variables $com_author & $contenu
        if (!empty($com_author) && !empty($contenu)) {
            // Sauvegarde du commentaire
            $this->commentaire->ajouterCommentaire($com_author, $contenu, $idArticle);
            // Actualisation de l'affichage du article
            header('Location: index.php?action=article&art_id=' . $idArticle);
            $_SESSION['flash'] = 'Votre commentaire est publié.';
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=article&art_id=' . $idArticle);
        }
    }


    //répondre à un commentaire
    /**
     * @param string $com_author
     * @param string $contenu
     * @param int $idArticle
     * @param int $idCommentaire
     */
    public function repondre($com_author, $contenu, $idArticle, $idCommentaire)
    {
        if (!empty($com_author) && !empty($contenu)) {

            // Sauvegarde du commentaire
            $this->commentaire->repondreCommentaire($com_author, $contenu, $idArticle, $idCommentaire);

            // Actualisation de l'affichage du article
            header('Location: index.php?action=article&art_id=' . $idArticle);
            $_SESSION['flash'] = 'Votre commentaire est publié.';
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=article&art_id=' . $idArticle);
        }
    }


    //Signaler un commentaire
    /**
     * @param int $idCommentaire
     */
    public function signalerCommentaire($idCommentaire){
        $this->commentaire->signalerCommentaire($idCommentaire);
        $commentaire = $this->commentaire->getCommentaire($idCommentaire);
        header ('Location: index.php?action=article&art_id=' . $commentaire['art_id']);
        $_SESSION['flash'] = 'Votre signalement a été pris en compte.';
    }
}