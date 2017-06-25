<?php

require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/User.php';

require_once 'Vue/Vue.php';

class ControleurAuthentification
{

    private $user;


    public
    function __construct()
    {
        $this->user = new User();
    }


    // Affiche la page d'authentification
    public
    function authentification()
    {
        $vue = new Vue("Authentification");
        $vue->generer(array ());
    }


    // Connecte un membre

    /**
     * @param string $user_pseudo
     * @param string $user_password
     */
    public
    function connexion(
        $user_pseudo,
        $user_password
    ) {
        $user = $this->user->getUser($user_pseudo, $user_password);

        if (!empty($user_pseudo) && !empty($user_password)) {
            if ($user) {
                if (isset($_SESSION['user'])) {
                    if (htmlspecialchars($user_pseudo) !== $_SESSION['user']['user_pseudo']) {
                        $_SESSION['flash'] = 'Attention. Vous êtes sur la session de '.htmlspecialchars(
                                $_SESSION['user']['user_firstname']
                            ).'. Vous devez déconnecter l utilisateur  pour pouvoir vous connecter';
                        header('Location: index.php?action=accueil');
                    } else {
                        $_SESSION['flash'] = 'Rebonjour '.htmlspecialchars(
                                $_SESSION['user']['user_firstname']
                            ).'. Vous êtes déjà connecté.';
                        header('Location: index.php?action=adminAccueil');
                    }
                } else {
                    $_SESSION['user'] = $user;
                    $_SESSION['flash'] = 'Bonjour '.htmlspecialchars(
                            $_SESSION['user']['user_firstname']
                        ).'. Vous êtes désormais connecté';
                    header('Location: index.php?action=adminAccueil');
                }
            } else {
                $_SESSION['flash'] = 'Mauvais identifiants de connexion';
                header('Location: index.php?action=authentification');
            }
        } else {
            $_SESSION['flash'] = 'Veuillez renseigner tous les champs du formulaire.';
            header('Location: index.php?action=authentification');
        }
    }

    // Déconnecte et détruit la session
    public
    function deconnexion()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?action=accueil');
    }
}