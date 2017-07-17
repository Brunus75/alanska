<?php

namespace Alanska\Modele;

// use Alanska\Modele\User;

//require_once 'AbstractEntityRepository.php';
//require_once 'User.php';

use AbstractEntityRepository;

Class UserRepository extends AbstractEntityRepository {

    // Renvoie la liste des membres
    /**
     *
     */
    public function getUsers() {
        $sql = 'SELECT *, DATE_FORMAT (user_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM user ORDER BY user_id ASC';
        $users = $this->executerRequete($sql);
        return $users;
    }

    // Renvoie les infos d'un membre
    /**
     * @param string $user_pseudo
     * @param string $user_password
     * @return mixed
     */
    public function getUser($user_pseudo, $user_password)
    {
        $sql = 'SELECT *, DATE_FORMAT (user_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM user WHERE user_pseudo=? AND user_password=?';
        $pwd = sha1($user_password);
        $user = $this->executerRequete($sql, array($user_pseudo, $pwd));
        return $user->fetch();  // Accès à la première ligne de résultat
    }

    //$pwd = sha1($user_password);
//$user = $this->executerRequete($sql, array($user_pseudo, $pwd));
//return $user->fetch();  // Accès à la première ligne de résultat

    /**
     * @param string $user_pseudo
     * @return mixed
     */
    public function getPseudoExist($user_pseudo)
    {
        $sql = 'SELECT COUNT(*) AS total FROM user WHERE user_pseudo="' . $user_pseudo . '"';
        $result = $this->executerRequete($sql);
        $nb = $result->fetch();
        $pseudoExist = $nb['total'];
        return $pseudoExist;
    }

// inscrire un nouveau membre
    /**
     * @param string $user_firstname
     * @param string $user_name
     * @param string $user_pseudo
     * @param string $user_password
     */
    public function inscription($user_firstname, $user_name, $user_pseudo, $user_password){
        $pwd = sha1($user_password);
        $sql = 'INSERT INTO user(user_date, user_firstname, user_name, user_pseudo, user_password) values(?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $user_firstname, $user_name, $user_pseudo, $pwd));
   }

    // Désinscrire un membre
    /**
     * @param int $user_id
     */
    public function deleteUser($user_id){
        $sql = 'DELETE FROM user WHERE user_id=?';
        $this->executerRequete($sql, array($user_id));
    }
}