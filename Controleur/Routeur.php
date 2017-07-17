<?php

namespace Alanska\Controleur;

use PHPUnit\Runner\Exception;
use Vue;

require_once '../Vue/Vue.php';

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
                    case 'CommentaireRepository' :
                        $com_id = intval($_GET['com_id']);
                        if ($com_id != 0) {
                            $this->controlCommentaire->commentaire($com_id);
                        } else
                            throw new Exception("Identifiant de commentaire non valide");
                        break;

                    //Afficher la page d'un article
                    case 'ArticleRepository' :
                        $art_id = intval($_GET['art_id']);
                        if ($art_id != 0) {
                            $this->controlArticle->article($art_id);
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


                        $this->controlCommentaire->commenter();
                        break;


        // 3 - Action sur un commentaire

                    // Répondre à un commentaire
                    case 'repondre' :


                        $this->controlCommentaire->repondre();
                        break;

                    // Signaler un commentaire
                    case 'signalerCommentaire' :

                        $this->controlCommentaire->signalerCommentaire();
                        break;


// B ACTIONS DE L'ADMINISTRATEUR

        // 1 - Affichage des pages Admin

                    // Afficher la page accueil de l'admin
                    case 'adminAccueil' :

                        $this->controlAdmin->adminAccueil();
                        break;

                    // Affiche la page Admin Commentaires
                    case 'adminCommentaires':

                        $this->controlAdmin->adminCommentaires(/*$art_id*/);

                        break;

                    // Afficher la page modifier Article avec le article à modifier
                    case 'modifierArticle':

                        $art_id = intval($_GET['art_id']);
                        if ($art_id != 0) {
                            $this->controlAdmin->modifierArticle($art_id);
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


                        $this->controlUser->inscription();
                        break;

                    // Connection
                    case 'connexion' :


                        $this->controlAuthentif->connexion();
                        break;

                    // Déconnection
                    case 'deconnexion' :

                        $this->controlAuthentif->deconnexion();
                        break;

                    // Suppression
                    case 'deleteUser' :
                        //$user_id =($_GET['user_id']);
                        $this->controlUser->deleteUser();
                        break;


        // 3 - Gestion des articles

                    // Ajout
                    case 'addArticle' :


                        $this->controlAdmin->addArticle();
                        break;

                    // Modification : non validé  ou validé
                    case 'updateArticle' :

                       // $art_id = intval($_GET['art_id']);

                        $this->controlAdmin->updateArticle();
                        break;

                    // Suppression
                    case 'deleteArticle' :
                        //$art_id = intval($_GET['art_id']);
                        $this->controlAdmin->deleteArticle();
                        break;

        // 4 - Gestion des commentaires

                    // Annuler un signalement
                    case 'annulerSignalement' :

                        $this->controlAdmin->annulerSignalement();
                        break;

                    // Supprimer un commentaire (Modération) avec les enfants (suppresion)
                    case 'supprimerCommentaire':

                        $this->controlAdmin->deleteCommentaire();
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


}
