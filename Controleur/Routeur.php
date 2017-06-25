<?php

require_once 'ControleurAccueil.php';
require_once 'ControleurArticle.php';
require_once 'ControleurAuthentification.php';
require_once 'ControleurCommentaire.php';
require_once 'ControleurAdmin.php';
require_once 'ControleurUser.php';


require_once 'Vue/Vue.php';

class Routeur
{

    private $controlAccueil;
    private $controlArticle;
    private $controlAuthentif;
    private $controlCommentaire;
    private $controlAdmin;
    private $controlUser;


    public function __construct()
    {
        $this->controlAccueil = new ControleurAccueil();
        $this->controlArticle = new ControleurArticle();
        $this->controlAuthentif = new ControleurAuthentification();
        $this->controlCommentaire = new ControleurCommentaire();
        $this->controlAdmin = new ControleurAdmin();
        $this->controlUser = new ControleurUser();
    }

    // Route une requête entrante => exécution l'action associée
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {


                switch ($_GET['action']) {


// A. ACTIONS GENERALES

        // 1 - Affichage des pages

                    //Afficher la page d'accueil
                    case 'accueil':
                        $this->controlAccueil->accueil();
                        break;

                    // Afficher de la page d'un commentaire avec formulaire
                    case 'commentaire' :
                        $idCommentaire = intval($this->getParametre($_GET, 'com_id'));
                        if ($idCommentaire != 0) {
                            $this->controlCommentaire->commentaire($idCommentaire);
                        } else
                            throw new Exception("Identifiant de commentaire non valide");
                        break;

                    //Afficher la page d'un article
                    case 'article' :
                        $idArticle = intval($this->getParametre($_GET, 'art_id'));
                        if ($idArticle != 0) {
                            $this->controlArticle->article($idArticle);
                        } else
                            throw new Exception("Identifiant de article non valide");
                        break;

                     // Afficher la page d'authentification
                    case 'authentification' :
                        $this->controlAuthentif->authentification();
                        break;


        // 2 - Actions sur un article

                    // Commenter un article
                    case 'commenter' :

                        $com_author = $this->getParametre($_POST, 'com_author');
                        $contenu = $this->getParametre($_POST, 'com_content');
                        $idArticle = $this->getParametre($_POST, 'art_id');
                        $this->controlCommentaire->commenter($com_author, $contenu, $idArticle);
                        break;


        // 3 - Action sur un commentaire

                    // Répondre à un commentaire
                    case 'repondre' :

                        $com_author = $this->getParametre($_POST, 'com_author');
                        $contenu = $this->getParametre($_POST, 'com_content');
                        $idArticle = $this->getParametre($_POST, 'art_id');
                        $idCommentaire = $this->getParametre($_POST, 'com_id');
                        $this->controlCommentaire->repondre($com_author, $contenu, $idArticle, $idCommentaire);
                        break;

                    // Signaler un commentaire
                    case 'signalerCommentaire' :

                        $this->controlCommentaire->signalerCommentaire($this->getParametre($_GET, 'com_id'));
                        break;


// B ACTIONS DE L'ADMINISTRATEUR

        // 1 - Affichage des pages Admin

                    // Afficher la page accueil de l'admin
                    case 'adminAccueil' :

                        $this->controlAdmin->adminAccueil();
                        break;

                    // Affiche la page Admin Commentaires
                    case 'adminCommentaires':

                        $this->controlAdmin->adminCommentaires(/*$idArticle*/);

                        break;

                    // Afficher la page modifier Article avec le article à modifier
                    case 'modifierArticle':

                        $idArticle = intval($this->getParametre($_GET, 'art_id'));
                        if ($idArticle != 0) {
                            $this->controlAdmin->modifierArticle($idArticle);
                        }
                        else {
                            throw new Exception("Identifiant d'article non valide");
                        }
                        break;

                    // Affiche la page Membres
                    case 'membres' :

                        $this->controlUser->users();
                        break;

                    // Affiche la page pour ajouter un article
                    case 'ajouterArticle':

                        $this->controlAdmin->ajouterArticle();
                        break;

        // 2 - Gestion des Membres

                    // Inscription
                    case 'inscription' :

                        $user_firstname = $this->getParametre($_POST, 'user_firstname');
                        $user_name = $this->getParametre($_POST, 'user_name');
                        $user_pseudo = $this->getParametre($_POST, 'user_pseudo');
                        $user_password = $this->getParametre($_POST, 'user_password');
                        $this->controlUser->inscription($user_firstname, $user_name, $user_pseudo, $user_password);
                        break;

                    // Connection
                    case 'connexion' :

                        $user_pseudo = $this->getParametre($_POST, 'user_pseudo');
                        $user_password = $this->getParametre($_POST, 'user_password');
                        $this->controlAuthentif->connexion($user_pseudo, $user_password);
                        break;

                    // Déconnection
                    case 'deconnexion' :

                        $this->controlAuthentif->deconnexion();
                        break;

                    // Suppression
                    case 'deleteUser' :

                        $this->controlUser->deleteUser($this->getParametre($_GET, 'user_id'));
                        break;


        // 3 - Gestion des articles

                    // Ajout
                    case 'addArticle' :

                        $art_title = $this->getParametre($_POST, 'art_title');
                        $contenu = $this->getParametre($_POST, 'art_content');
                        $action = $this->getParametre($_POST, 'action');
                        $this->controlAdmin->addArticle($art_title, $contenu, $action);
                        break;

                    // Modification : non validé  ou validé
                    case 'updateArticle' :

                        $idArticle = intval($this->getParametre($_GET, 'art_id'));
                        $art_title = $this->getParametre($_POST, 'art_title');
                        $contenu = $this->getParametre($_POST, 'art_content');
                        $action = $this->getParametre($_POST, 'action');
                        $this->controlAdmin->updateArticle($idArticle, $art_title, $contenu, $action);
                        break;

                    // Suppression
                    case 'deleteArticle' :

                        $this->controlAdmin->deleteArticle($this->getParametre($_GET, 'art_id'));
                        break;

        // 4 - Gestion des commentaires

                    // Annuler un signalement
                    case 'annulerSignalement' :

                        $this->controlAdmin->annulerSignalement($this->getParametre($_GET, 'com_id'));
                        break;

                    // Supprimer un commentaire (Modération) avec les enfants (suppresion)
                    case 'supprimerCommentaire':

                        $idCommentaire = $this->getParametre($_GET, 'com_id');
                        $this->controlAdmin->deleteCommentaire($idCommentaire);
                        break;

                    default :
                        throw new Exception("Désolé, action non valide");
                }
            }

            // Pas d'action => page Accueil
            else {
                $this->controlAccueil->accueil();
            }


        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $user_name)
    {
        if (isset($tableau[$user_name])) {
            return $tableau[$user_name];
        } else
            throw new Exception("Paramètre '$user_name' absent");
    }

}
