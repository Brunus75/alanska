<section>
    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2>Répondre à un commentaire</h2>
                <hr/>
            </div>
        </div>
    </div>
</section>

<div class="page">

    <section>
        <div class="row">
            <h3 id="titreReponse">Commentaire</h3>

            <p>
                <time style="color:#CB978C"><i>Publié le <?= $commentaire['date_fr'] ?></i></time>
                par <?= htmlspecialchars($commentaire['com_author']) ?>
            <p><?= htmlspecialchars($commentaire['com_content']) ?></p>

            <hr/>
            <h3 id="titreReponse">Votre réponse </h3>
            <br/>
            <?php require 'formulaireReponse.php'; ?>
        </div>
    </section>
    <br/><br/>
</div>

