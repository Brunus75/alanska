<?php

foreach ($commentaires as $commentaire) : ?>

<div class="indent">
    <p>
        <strong> <?=htmlspecialchars($commentaire['com_author'])?></strong> - <?= $commentaire['date_fr']?> <br/>
        <em><?= htmlspecialchars($commentaire['com_content']) ?></em><br>
    </p>

    <?php if ($commentaire['com_signale'] > 0) { ?>
    <p class="avertirMessageCommentaire"> (Message signalé au modérateur)</p>
    <?php } ?>

    <p>
        <?php if ($commentaire['com_delete'] == 0) {
            if ($commentaire['com_niveau'] < 3) { ?>
                <a class="btn btn-info reponseCommentaire"  href="index.php?action=commentaire&art_id=<?=$commentaire['art_id']?>&com_id=<?=$commentaire['com_id']?>">Répondre</a>
            <?php } ?>
            <a class="btn btn-warning validerSignalerCommentaire"  href=" index.php?action=signalerCommentaire&com_id=<?=$commentaire['com_id']?>">Signaler</a>
        <?php } ?>
    </p>

    <?php $commentaires = $commentaireModele->getCommentaireChilds($commentaire['com_id']);



    ?>
   <?php include 'commentaires.php'; ?>
</div>
<?php endforeach; ?>