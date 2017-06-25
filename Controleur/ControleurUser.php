<?php
//session_start()

require_once 'Modele/User.php';
require_once 'Vue/Vue.php';

class ControleurUser
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    // Affiche la liste des membres
    public function users()
    {
        $users = $this->user->getusers();
        $vue = new Vue("Membres");
        $vue->generer(array('users' => $users));
    }

    //Inscrire un membre
    /**
     * @param string $user_firstname
     * @param string $user_name
     * @param string $user_pseudo
     * @param string $user_password
     */
    public function inscription($user_firstname, $user_name, $user_pseudo, $user_password)
    {

        if (!empty($user_pseudo) && !empty($user_password)) {
            if (isset($_SESSION['user'])) {
                $pseudoExist = $this->user->getPseudoExist($user_pseudo);
                if ($pseudoExist == 0) {
                    $this->user->inscription($user_firstname, $user_name, $user_pseudo, $user_password);
                    header('Location: index.php?action=membres');
                    $_SESSION['flash'] = 'Nous confirmons votre inscription;';
                }
                else {
                    $_SESSION['flash'] = 'Déjà utilisé, merrci de saisir un autre pseudo';
                    header('Location: index.php?action=membres');
                }
            }
            else {
                $_SESSION['flash'] = 'Inscription IMPOSIBLE';
                header('Location: index.php?action=accueil');
            }
        }
        else {
            $_SESSION['flash'] = 'Remplir S-V-P tous les champs du formulaire.';
            header('Location: index.php?action=membres');
        }


    }

    // désinscrire un membre
    /**
     * @param int $idUser
     */
    public function deleteUser($idUser)
    {
        if (isset($_SESSION['user'])) {
            $this->user->deleteUser($idUser);
            $users = $this->user->getUsers();
            $_SESSION['flash'] = 'Nous confirmons votre suppression.';
            $vue = new Vue("Membres");
            $vue->generer(array('users' => $users));
        }
        else {
            $_SESSION['flash'] = 'Suppression IMPOSSIBLE';
            header('Location: index.php?action=accueil');
        }
    }

}
