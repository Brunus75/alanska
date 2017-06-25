<?php

require_once 'Modele.php';


class Commentaire extends Modele
{

    // Renvoie les informations sur un commentaire
    /**
     * @param int $idCommentaire
     * @return mixed
     * @throws Exception
     */


    public function getCommentaire($idCommentaire)
    {
        $sql = 'SELECT *, DATE_FORMAT (com_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM comment WHERE com_id=?';
        $commentaire = $this->executerRequete($sql, array($idCommentaire));
        if ($commentaire->rowCount() > 0)
            return $commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCommentaire'");
    }

    // Renvoie la liste des commentaires de com_niveau 0 associés à un article
    /**
     * @param int $idArticle
     * @return PDOStatement
     */
    public function getCommentaires($idArticle)
    {
        $sql = 'SELECT *, DATE_FORMAT (com_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM comment WHERE art_id=? AND com_niveau=0 ORDER BY com_id   ASC';
        $commentaires = $this->executerRequete($sql, array($idArticle));
        return $commentaires;
    }


 /**********   AJOUTER POUR GERER LA SUPPRESSION DES SOUS COMMENTAIRES   **********************
 / Renvoie la liste de tous les commentaires associés à un article
 /**
  * @param int $idArticle
  * @return PDOStatement
  */
 /*   public function getAllCommentairesID($idArticle)
    {
        $sql = 'SELECT *, DATE_FORMAT (com_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM comment WHERE art_id=? ORDER BY com_id ASC';
        $commentaires = $this->executerRequete($sql, array($idArticle));
        return $commentaires;
    }

    /**
     * Récupère tous les commentaire organisé par ID
     * @param $com_id
     * @return array
     */
/*    public function infoTousCommentairesId($idArticle)
    {
        $sql = 'SELECT * FROM comment WHERE art_id = ?';
        $req = $this->executerRequete($sql, array($idArticle));
        $comments = $req ->fetchAll(); // Accès aux lignes de résultat
        return $comments;
    }


    //Renvoie la liste des sous commentaires
    /**
     * @param int $idCommentaire
     * @return PDOStatement
     */
   public function getCommentaireChilds($idCommentaire)
    {
        $sql = 'SELECT *, DATE_FORMAT (com_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM comment WHERE parent_id=? ORDER BY com_id ASC';
        $reponses = $this->executerRequete($sql, array($idCommentaire));
        return $reponses;
    }


    // Ajoute un commentaire à un article avec indication du champ grand_parent_id
    /**
     * @param string $com_author
     * @param string $contenu
     * @param int $idArticle
     */
    public function ajouterCommentaire($com_author, $contenu, $idArticle)
    {
        $sql = 'SELECT com_id FROM comment ORDER BY com_id DESC LIMIT 0, 1';
        $selectLast = $this->executerRequete($sql);
        $lastId = $selectLast->fetch();
        //echo $lastId['com_id']; // $lastId['com_id'] cette variable contient le dernier id<br>
        // $selectLast ->closeCursor();
        $idGrandParent = (($lastId['com_id']) + 1);
        $sql = 'INSERT INTO comment(com_date, com_author, com_content, art_id, parent_id, com_niveau, grand_parent_id) values(?, ?, ?, ?, 0 , 0, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante

        $this->executerRequete($sql, array($date, $com_author, $contenu, $idArticle, $idGrandParent));
    }


    // Repondre à un commentaire
    /**
     * @param string $com_author
     * @param string $contenu
     * @param int $idArticle
     * @param int $idCommentaire
     */
    public function repondreCommentaire($com_author, $contenu, $idArticle, $idCommentaire)
    {
        $commentaireParent = $this->getCommentaire($idCommentaire);
        $sql = 'INSERT INTO comment(com_date, com_author, com_content, art_id, parent_id, com_niveau, grand_parent_id) values(?, ?, ?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Récupère la date courante
        $this->executerRequete($sql, array($date, $com_author, $contenu, $idArticle, $commentaireParent['com_id'], $commentaireParent['com_niveau'] + 1, $commentaireParent['grand_parent_id']));
    }


    // signaler un commentairesignalement
    /**
     * @param int $idCommentaire
     */
    public function signalerCommentaire($idCommentaire)
    {
        $sql = 'UPDATE comment SET com_signale = 1 WHERE com_id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }


    // Renvoie la liste de tous les commentaires
    /**
     * @return PDOStatement
     */
    public function getAdminCommentaires()
    {
        $sql = 'SELECT *, DATE_FORMAT (com_date, \'%d/%m/%Y à %H:h%i:%s\') AS date_fr FROM comment ORDER BY com_signale DESC, com_id DESC';
        $adminCommentaires = $this->executerRequete($sql);
        return $adminCommentaires;
    }


    // Renvoie le nombres de commentaires signalés
    /**
     * @return mixed
     */
    public function getNbSignalements()
    {
      $sql = 'SELECT COUNT(*) as total FROM comment WHERE com_signale>0';
      $result = $this->executerRequete($sql);
      $nb = $result->fetch();
      $nbSignalements = $nb['total'];
      return $nbSignalements;
    }


    // supprime un commentaire ( Indication Modérateur )
    /**
     * @param int $idCommentaire
     */
    public function deleteCommentaire($idCommentaire)
    {
        $sql = 'UPDATE comment SET com_author = \'Modérateur\', com_content = \'(Commentaire supprimé) \', com_delete = 1 WHERE com_id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }


    // supprime les sous commentaires du commentaire supprimé
    /**
     * @param int $idCommentaire
     */
    public function deleteSousCommentaire($idCommentaire)
    {
        $sql = 'DELETE FROM comment WHERE comment.parent_id != 0 AND  comment.grand_parent_id=?';
        $this->executerRequete($sql, array($idCommentaire));
        return;
    }


    // Annule un signalement
    /**
     * @param int $idCommentaire
     */
    public function annulerSignalement($idCommentaire)
    {
        $sql = 'UPDATE comment SET com_signale = 0 WHERE com_id=?';
        $this->executerRequete($sql, array($idCommentaire));
    }



}