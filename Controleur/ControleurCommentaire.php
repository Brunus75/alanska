<?php

namespace Alanska\Controleur;

use Alanska\Modele\Article;
use Alanska\Modele\Commentaire;
use Vue;


class ControleurCommentaire extends Controleur
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
     * @param int $com_id
     */
    public function commentaire($com_id)
    {

        $commentaire = $this-> commentaire ->getCommentaire($com_id);
        $vue = new Vue("Commentaire");
        $vue->generer(array('CommentaireRepository' => $commentaire));
    }


    // Ajoute un commentaire à un article
    /**
     * @param string $com_author
     * @param string $art_content
     * @param int $art_id
     */
    public function commenter()
    {
        // Sauvegarde du commentaire
        $com_author = $this->getParametre($_POST, 'com_author');
        $art_content = $this->getParametre($_POST, 'com_content');
        $art_id = $this->getParametre($_POST, 'art_id');
        $this-> commentaire ->ajouterCommentaire($com_author, $art_content, $art_id);

        // Test les variables $com_author & $art_content
        if (!empty($com_author) && !empty($art_content)) {

            // Actualisation de l'affichage du article
            header('Location: index.php?action=article&art_id=' . $art_id);
            $_SESSION['flash'] = 'Votre commentaire est publié.';
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=article&art_id=' . $art_id);
        }
    }


    //répondre à un commentaire
    /**
     * @param string $com_author
     * @param string $art_content
     * @param int $art_id
     * @param int $com_id
     */
    public function repondre()
    {

        $com_author = $this->getParametre($_POST, 'com_author');
        $com_content = $this->getParametre($_POST, 'com_content');
        $art_id = $this->getParametre($_POST, 'art_id');
        $com_id = $this->getParametre($_POST, 'com_id');

        if (!empty($com_author) && !empty($art_content)) {



            // Sauvegarde du commentaire
            $this-> commentaire ->repondreCommentaire($com_author, $com_content, $art_id, $com_id);

            // Actualisation de l'affichage du article
            header('Location: index.php?action=article&art_id=' . $art_id );
            $_SESSION['flash'] = 'Votre commentaire est publié.';
        }
        else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=article&art_id=' . $art_id );
        }
    }


    //Signaler un commentaire
    /**
     * @param int $com_id
     */
    public function signalerCommentaire()
    {
        $com_id = $this->getParametre($_GET, 'com_id');

        $this->commentaire->signalerCommentaire($com_id);
        $commentaire = $this->commentaire->getCommentaire($com_id);
        header ('Location: index.php?action=article&art_id=' . $commentaire['art_id']);
        $_SESSION['flash'] = 'Votre signalement a été pris en compte.';
    }
}