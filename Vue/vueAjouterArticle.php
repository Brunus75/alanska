<?php $this->titre = "Ajouter un article"; ?>

<?php /*
if(isset($_SESSION['USER'])){
header('Location: index.php?action=adminAccueil');
}
else {
header('Location: index.php?action=accueil');
}
*/ ?>

    <header>

        <?php require 'menuAdmin.php'; ?>

    </header>

    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Ecrire un nouvel article</h2>
                <hr/>

            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">
                    <hr/>
                    <form method="post" action="<?= "index.php?action=addArticle" ?>">
                        <input id="titrenouveauArticle" name="art_title" type="text" class="form-control"
                               placeholder="titre de l'article"
                               required><br/>
                        <textarea id="txtArticle" name="art_content" rows="30" class="form-control" placeholder="Texte" required> </textarea><br/>
                        <input class="btn btn-warning" type="submit" name="action" value="brouillon"/>
                        <input class="btn btn-success" style="margin-left:50px; float: right" type="submit"
                               name="action" value="publier"/>
                    </form>
                </div>
            </div>
            <br/><br/>
        </section>
    </div>