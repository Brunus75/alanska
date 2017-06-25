<?php $this->titre = "Ajouter un article"; ?>

<header>
    <?php require 'menuAdmin.php'; ?>
</header>

<div class="titre">
    <div class="row">
        <div class="col-xs-12">
            <h2 id="admin">Modifier un article</h2>
            <hr/>

        </div>
    </div>
</div>


    <div class="page">
        <section>
            <div class="row">
                <div class="col-xs-12">
                 <hr/>
                    <form method="post" action="<?= "index.php?action=updateArticle&art_id=" . $article['art_id'] ?>">
                        <input id="titreArticle" name="art_title" type="text" class="form-control"
                               placeholder="titre de l'article" value="<?= htmlspecialchars($article['art_title']) ?>"
                               required><br/>
                        <textarea id="txtModifierArticle" name="art_content" rows="30" class="form-control" placeholder="Texte"
                                  required><?= $article['art_content'] ?> </textarea><br/>
                        <input type="hidden" name="idArticle" value="<?= $article['art_id'] ?>"/>
                        <input class="btn btn-warning" type="submit" name="action" value="Brouillon"/>
                        <input class="btn btn-info" style="margin-left:50px; float: right" type="submit"
                               name="action" value="Publier"/>
                    </form>
                </div>
            </div>
            <br/><br/>
        </section>
    </div>
