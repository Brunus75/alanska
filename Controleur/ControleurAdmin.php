<?php

namespace Alanska\Controleur;

use Alanska\Modele\Article;
use Alanska\Modele\Commentaire;
use Alanska\Modele\User;
use Vue;

class ControleurAdmin extends Controleur
{

    private $article;
    private $commentaire;
    private $user;


    public
    function __construct()
    {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
        $this->user = new User();
    }


// AFFICHAGE DES PAGES ADMIN

    // Affiche la page d'accueil Admin avec la liste de tous les articles publiés, brpuillon, supprimés

    public
    function adminAccueil()
    {
        if (isset($_SESSION['UserRepository'])) {
            $adminArticles = $this-> article ->getAdminArticles();
            $vue = new Vue("AdminAccueil");
            $vue->generer(array ('adminArticles' => $adminArticles));
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisés à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

    // Affiche la page " ajouterArticle "

    public
    function ajouterArticle()
    {
        if (isset($_SESSION['UserRepository'])) {
            $vue = new Vue("AjouterArticle");
            $vue->generer(array ());
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

    // Affiche la page " modifierArticle "

    /**
     * @param int $art_id
     */

    public
    function modifierArticle($art_id) {
        if (isset($_SESSION['UserRepository'])) {
            $article = $this-> article->getArticle($art_id);
            $vue = new Vue("ModifierArticle");
            $vue->generer(array ('ArticleRepository' => $article));
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    // Affiche la liste des commentaires et le nombre de commentaires signalés
    public
    function adminCommentaires()
    {
        if (isset($_SESSION['UserRepository'])) {
            $nbSignalements = $this-> commentaire ->getNbSignalements();
            $adminCommentaires = $this-> commentaire ->getAdminCommentaires();
            $vue = new Vue("AdminCommentaires");
            $vue->generer(array ('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


// ACTIONS ADMIN SUR UN ARTICLE

    // Ajouter un article
    /**
     * @param string $art_title
     * @param string $art_content
     * @param string $action
     */

    public
    function addArticle() {

        $art_title = $this->getParametre($_POST, 'art_title');
        $art_content = $this->getParametre($_POST, 'art_content');
        $action = $this->getParametre($_POST, 'action');

        if (!empty($art_title) && !empty($art_content)) {
            if (isset($_SESSION['UserRepository'])) {
                if ($action == 'brouillon') {

                    $this-> article->brouillonArticle($art_title, $art_content);
                    $_SESSION['flash'] = 'Votre article est sauvegardé en brouillon.';
                    header('Location: index.php?action=adminAccueil');
                } else {
                    if ($action == 'publier') {
                        $this-> article->publierArticle($art_title, $art_content);
                        $_SESSION['flash'] = 'Votre article est publié.';
                        header('Location: index.php?action=adminAccueil');
                    }
                }
            } else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        } else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=ajouterArticle');
        }


    }

    // Modifier un article

    /**
     * @param int $art_id
     * @param string $art_title
     * @param string $art_content
     * @param string $action
     */

    public
    function updateArticle()
    {

        $art_id = $this -> getParametre/*(intval*/($_GET, 'art_id');
        //$art_id = intval($_GET['art_id']);
        $art_title = $this->getParametre($_POST, 'art_title');
        $art_content = $this->getParametre($_POST, 'art_content');
        $action = $this->getParametre($_POST, 'action');

        if (!empty($art_title) && !empty($art_content)) {
            if (isset($_SESSION['UserRepository'])) {
                if ($action == 'Brouillon') {
                    $this-> article ->brouillonUpdate($art_id, $art_title, $art_content);
                    $_SESSION['flash'] = 'Vos modifications sont sauvegardées en brouillon.';
                    header('Location: index.php?action=adminAccueil');
                } else {
                    if ($action == 'Publier') {
                        $this-> article ->publierUpdate($art_id, $art_title, $art_content);
                        $_SESSION['flash'] = 'Votre article modifié est publié.';
                        header('Location: index.php?action=adminAccueil');
                    }
                }
            } else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        } else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=modifierArticle&art_id='.$art_id);
        }

    }


    // supprimer un article

    /**
     * @param int $art_id
     */

    public
    function deleteArticle()
    {
        $art_id = $this -> getParametre/*(intval*/($_GET, 'art_id');

        if (isset($_SESSION['UserRepository'])) {
            $this-> article ->deleteArticle($art_id);
            $adminArticles = $this-> article ->getAdminArticles();
            $_SESSION['flash'] = 'L\'article n\'est plus publié. Vous pouvez néamoins toujours le retrouver sur cette page dans la liste des articles.';
            $vue = new Vue("AdminAccueil");
            $vue->generer(array ('adminArticles' => $adminArticles));
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

// ACTIONS ADMIN SUR UN COMMENTAIRE


    // Supprimer un commentaire avec Enfant
    /**
     * @param int $com_id
     */

// Supprimer un commentaire avec Enfant
    /**
     * @param int $com_id
     */

    public function deleteCommentaire()
    {
        $com_id = $this -> getParametre/*(intval*/($_GET, 'com_id');
        if (isset($_SESSION['UserRepository'])) {
            $this-> commentaire ->deleteCommentaire($com_id);
            $this-> commentaire ->deleteSousCommentaire($com_id);
            $this-> commentaire ->annulerSignalement($com_id);
            $nbSignalements = $this-> commentaire->getNbSignalements();
            $adminCommentaires = $this-> commentaire ->getAdminCommentaires();
            $_SESSION['flash'] = 'Le commentaire est supprimé.';
            $vue = new Vue("AdminCommentaires");
            $vue->generer(array('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
        }
        else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

        // Annuler un com_signale
        /**
         * @param int $com_id
         */

        public
        function annulerSignalement()
        {
            $com_id = $this->getParametre($_GET, 'com_id');
            if (isset($_SESSION['UserRepository'])) {
                $this-> commentaire ->annulerSignalement($com_id);
                $nbSignalements = $this-> commentaire ->getNbSignalements();
                $adminCommentaires = $this-> commentaire ->getAdminCommentaires();
                $_SESSION['flash'] = 'Le commentaire n\'est plus signalé.';
                $vue = new Vue("AdminCommentaires");
                $vue->generer(array ('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
            } else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        }

}

