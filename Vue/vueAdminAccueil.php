<?php $this->titre = "Administrateur"; ?>

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

        <?php
        // Pour visualiser " user_first_name "
        //echo ($_SESSION['user']['user_firstname']); ?>


    </header>

    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Administration des articles</h2>
                <hr/>
            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Ecrire un nouvel article
                        <a class="btn btn-info" style="float: right; margin-right: 2%; width:80px; font-size: 12px;"
                           href="<?= "index.php?action=ajouterArticle" ?>">Valider</a></h3>
                </div>
            </div>
            <hr/>
        </section>
        <section>
            <div class='row'>
                <div class="col-xs-12">
                    <h3>Modifier ou supprimer un article existant</h3>
                    <br/>
                    <table class="table table-hover" cellspacing="0" width="100%">


                        <thead>
                        <tr>
                            <th>Date de publication</th>
                            <th>Articles</th>
                            <th>Etat</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($adminArticles as $article): ?>
                            <tr>
                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $article['date_fr'] ?></i></time>
                                </td>
                                <td>
                                    <a href="<?= "index.php?action=article&art_id=" . $article['art_id'] ?>">
                                        <p class="titreArticle"><?= htmlspecialchars($article['art_title']) ?></p><br/>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    if ($article['art_publish'] == 0){
                                        echo '<p style="color: green; font-style : italic; "> Non publié';
                                        echo '</p>';
                                    }
                                    else if ($article['art_publish'] == 1){
                                        echo '<p style="color: grey; font-style : italic; "> Publié';
                                        echo '</p>';
                                    }
                                     else if ($article['art_publish'] == 2){
                                        echo '<p style="color: red; font-style : italic; "> Supprimé';
                                        echo '</p>';
                                    }
                                    ?>



                                </td>
                                <td>
                                    <a class="btn btn-warning" style="font-size: 12px; width: 80px;"
                                       href="<?= "index.php?action=modifierArticle&art_id=" . $article['art_id'] ?>">Modifier</a>
                                </td>
                                <td>
                                    <?php if ($article['art_publish'] != 2) {

                                    echo
                                    '<a class="btn btn-danger" style="font-size: 12px;width: 80px;"
                                       href="' . "index.php?action=deleteArticle&art_id=" . $article['art_id'] . '">Supprimer'; echo '</a>'; } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br/><br/><br/>
                </div>

                <hr/>

        </section>
    </div>