<?php

$this->titre = "Mon Blog - " . htmlspecialchars($article['art_title']); ?>


<section>
    <div class="titre">
        <h2 class="titreArticle2"><?= htmlspecialchars($article['art_title']) ?></h2>
        <time style="color:#CB978C"><i>Edité le <?= $article['date_fr'] ?></i></time>
        <hr/>
    </div>
</section>

<div class="page">

    <section>

        <p><?= ($article['art_content']) ?></p>
        <br/>
        <hr/>

    </section>


    <section>
        <?php require 'formulaireCommentaire.php'; ?>
    </section>

    <section>
        <h3>Commentaires </h3>

        <?php include 'commentaires.php'; ?>

        <br/>
        <br/>

    </section>
</div>