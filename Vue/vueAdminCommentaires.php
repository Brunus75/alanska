<?php $this->titre = "Administrateur"; ?>

    <section>
    <header>

        <?php require 'menuAdmin.php'; ?>

    </header>

    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="admin">Administration des commentaires</h2>
                <hr/>

                <p>Vous avez <?= $nbSignalements ?> commentaire(s) signalé(s)</p>

                <hr/>
            </div>
        </div>
    </div>

    <div class="page">

        <section>
            <div class="row">
                <div class="col-xs-12">

                    <h3>Liste des commentaires</h3>
                    <br />

                    <table class="table table-hover" cellspacing="0" width="100%">

                        <thead>
                        <tr>
                            <th>Statut</th>
                            <th>Date de publication</th>
                            <th>Auteur</th>
                            <th>contenu</th>
                            <th>Supprimer le commentaire</th>
                            <th>Annuler le signalement</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ( $adminCommentaires as $commentaire): ?>
                            <tr>

                                <td>
                                    <?php if ($commentaire['com_signale'] > 0) {
                                        echo ' <div style="color: orangered;"> signalé </div>';
                                    } else {
                                        echo '<div style="color: green;"> OK </div>';
                                    } ?>
                                </td>

                                <td>
                                    <time style="color:grey; font-size: 0.8em"><i><?= $commentaire['date_fr'] ?></i>
                                    </time>
                                </td>
                                <td>
                                    <p class="auteurCommentaire"><?= htmlspecialchars($commentaire['com_author']) ?><br/>
                                    </p>
                                </td><td>
                                    <a href="<?= "index.php?action=article&art_id=" . $commentaire['art_id'] ?>">
                                        <p class="contenuCommentaire"><?= htmlspecialchars($commentaire['com_content']) ?><br/>
                                        </p></a>
                                </td>
                                <td>
                                    <?php if ($commentaire['com_delete'] != 1) {
                                        echo
                                            '<a class="btn btn-danger" style="font-size: 12px;width: 80px;"
                                       href="' . "index.php?action=supprimerCommentaire&com_id=" . $commentaire['com_id'] . '">Supprimer'; echo '</a>'; } ?>
                                </td>
                                <td>
                                    <?php if ($commentaire['com_delete'] != 1 && $commentaire['com_signale'] !=0) {
                                        echo
                                            '<a class="btn btn-warning" style="font-size: 12px;width: 80px;"
                                       href="' . "index.php?action=annulerSignalement&com_id=" . $commentaire['com_id'] . '">Valider'; echo '</a>'; } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <br/><br/><br/>
                </div>
            </div>


        </section>
    </div>
    <?php  /*
                                    if ($commentaire['com_signale'] > 0) {
                                                if ($commentaire['com_delete'] = 0 ) {
                                                echo ' <div style="color: red;"> signalé </div>';
                                                }else{
                                                    if ($commentaire['com_signale'] = 1){                                                                     echo ' <div style="color: orange;"> signalé </div>';
                                                } else {
                                                echo '<div style="color: green;"> OK </div>';
                                    } */ ?>