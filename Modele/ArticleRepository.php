<?php

namespace Alanska\Modele;

//require_once 'AbstractEntityRepository.php';
//require_once 'Article.php';


use AbstractEntityRepository;
use PHPUnit\Runner\{
    Exception
};

class ArticleRepository extends AbstractEntityRepository
    {



//Liste des articles validés (art_publish = 1)

    public function getArticles() {
        $sql = 'SELECT *, DATE_FORMAT (art_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM article WHERE art_publish = 1 ORDER BY art_id DESC';
        $articles = $this->executerRequete($sql);
        return $articles;
    }


//Informations sur les articles
    public function getArticle($art_id) {
        $sql = 'SELECT *, DATE_FORMAT (art_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM article WHERE art_id=?';
        $article = $this->executerRequete($sql, array($art_id));
        if ($article->rowCount() > 0)
            return $article->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun article ne correspond à l'identifiant '$art_id'");
    }


//Admin => lites des articles -> non validés, validés, refusés
    public function getAdminArticles() {
        $sql = 'SELECT *, DATE_FORMAT (art_date, \'%d/%m/%Y à %H:%i:%s\') AS date_fr FROM article ORDER BY art_id DESC';
        $adminArticles = $this->executerRequete($sql);
        return $adminArticles;
    }


// + articles -> non validés (art_publish = 0)
    public function brouillonArticle($art_title, $art_content)
    {
        $sql = 'INSERT INTO article (art_title, art_date, art_content, art_publish) values(?, ?, ?, 0)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array($art_title, $date, $art_content));
    }


// articles non validés => validés (art_publish = 1)
    public function publierArticle($art_title, $art_content)
    {
        $sql = 'INSERT INTO article(art_title, art_date, art_content, art_publish) values(?, ?, ?, 1)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array($art_title, $date, $art_content));
    }


// articles non validés => modifiés => validés (art_publish = 1)
    public function publierUpdate ($art_title, $art_content, $art_id){
        $sql = "UPDATE article SET art_title='" . $_POST['art_title'] . "', art_content='" . $_POST['art_content'] . "', art_publish=1 WHERE art_id = '" . $_GET['art_id'] . "'";
        $this->executerRequete($sql, array($art_title, $art_content, $art_id));
    }


// articles => modifiés => non validés (art_publish = 0)
    public function brouillonUpdate($art_title, $art_content, $art_id){
        $sql = "UPDATE article SET art_title='" . $_POST['art_title'] . "', art_content='" . $_POST['art_content'] . "', art_publish=0 WHERE art_id = '" . $_GET['art_id'] . "'";
        $this->executerRequete($sql, array($art_title, $art_content, $art_id));
    }
    

// articles non validées + validés => refusés (art_publish = 2)
    public function deleteArticle($art_id){
        $sql = 'UPDATE article SET art_publish=2 WHERE art_id=?';
        $this->executerRequete($sql, array($art_id));
    }
}