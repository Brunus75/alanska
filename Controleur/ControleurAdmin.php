<?php

require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';
require_once 'Vue/Vue.php';


class ControleurAdmin
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
        if (isset($_SESSION['user'])) {
            $adminArticles = $this->article->getAdminArticles();
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
        if (isset($_SESSION['user'])) {
            $vue = new Vue("AjouterArticle");
            $vue->generer(array ());
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }

    // Affiche la page " modifierArticle "

    /**
     * @param int $idArticle
     */

    public
    function modifierArticle(
        $idArticle
    ) {
        if (isset($_SESSION['user'])) {
            $article = $this->article->getArticle($idArticle);
            $vue = new Vue("ModifierArticle");
            $vue->generer(array ('article' => $article));
        } else {
            $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
            header('Location: index.php?action=accueil');
        }
    }


    // Affiche la liste des commentaires et le nombre de commentaires signalés
    public
    function adminCommentaires()
    {
        if (isset($_SESSION['user'])) {
            $nbSignalements = $this->commentaire->getNbSignalements();
            $adminCommentaires = $this->commentaire->getAdminCommentaires();
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
     * @param string $ontenu
     * @param string $action
     */

    public
    function addArticle(
        $art_title,
        $contenu,
        $action
    ) {

        if (!empty($art_title) && !empty($contenu)) {
            if (isset($_SESSION['user'])) {
                if ($action == 'brouillon') {

                    $this->article->brouillonArticle($art_title, $contenu);
                    $_SESSION['flash'] = 'Votre article est sauvegardé en brouillon.';
                    header('Location: index.php?action=adminAccueil');
                } else {
                    if ($action == 'publier') {
                        $this->article->publierArticle($art_title, $contenu);
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
     * @param int $idArticle
     * @param string $art_title
     * @param string $contenu
     * @param string $action
     */

    public
    function updateArticle(
        $idArticle,
        $art_title,
        $contenu,
        $action
    ) {

        if (!empty($art_title) && !empty($contenu)) {
            if (isset($_SESSION['user'])) {
                if ($action == 'Brouillon') {
                    $this->article->brouillonUpdate($idArticle, $art_title, $contenu);
                    $_SESSION['flash'] = 'Vos modifications sont sauvegardées en brouillon.';
                    header('Location: index.php?action=adminAccueil');
                } else {
                    if ($action == 'Publier') {
                        $this->article->publierUpdate($idArticle, $art_title, $contenu);
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
            header('Location: index.php?action=modifierArticle&art_id='.$idArticle);
        }

    }


    // supprimer un article

    /**
     * @param int $idArticle
     */

    public
    function deleteArticle(
        $idArticle
    ) {
        if (isset($_SESSION['user'])) {
            $this->article->deleteArticle($idArticle);
            $adminArticles = $this->article->getAdminArticles();
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
     * @param int $idCommentaire
     */

// Supprimer un commentaire avec Enfant
    /**
     * @param int $idCommentaire
     */

    public function deleteCommentaire($idCommentaire)
    {
        if (isset($_SESSION['user'])) {
            $this->commentaire->deleteCommentaire($idCommentaire);
            $this->commentaire->deleteSousCommentaire($idCommentaire);
            $this->commentaire->annulerSignalement($idCommentaire);
            $nbSignalements = $this->commentaire->getNbSignalements();
            $adminCommentaires = $this->commentaire->getAdminCommentaires();
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
         * @param int $idCommentaire
         */

        public
        function annulerSignalement($idCommentaire)
        {
            if (isset($_SESSION['user'])) {
                $this->commentaire->annulerSignalement($idCommentaire);
                $nbSignalements = $this->commentaire->getNbSignalements();
                $adminCommentaires = $this->commentaire->getAdminCommentaires();
                $_SESSION['flash'] = 'Le commentaire n\'est plus signalé.';
                $vue = new Vue("AdminCommentaires");
                $vue->generer(array ('adminCommentaires' => $adminCommentaires, 'nbSignalements' => $nbSignalements));
            } else {
                $_SESSION['flash'] = 'Vous n\'êtes pas autorisé à effectuer cette commande.';
                header('Location: index.php?action=accueil');
            }
        }

}

