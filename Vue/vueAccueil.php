<?php $this->titre = "Roman  - Accueil"; ?>


<header>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="Public/image/header2.jpg" alt="Paysage" style="width:100%;">
            </div>

            <div class="item">
                <img src="Public/image/header1.jpg" alt="Ete" style="width:100%;">
            </div>

            <div class="item">
                <img src="Public/image/header3.jpg" alt="Aurore" style="width:100%;">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</header>


<section>
    <div class="titre">
        <div class="row">
            <div class="col-xs-12">
                <h2 id="accueil">UN DIMANCHE SOIR EN ALASKA</h2>
                <p>Le Roman de DON REARDEN</p>
                <hr/>
                <br/>
            </div>
        </div>
    </div>
</section>

<div class="page">

    <section>
        <div class="row">
            <div class="col-xs-12">
                <img src="Public/image/alanska.png" alt="Couverture Roman" id="Alanska"
                <p>Quelques baraques bancales posées sur un monde en sursis. Aux confins de l'Amérique et des glaces, le petit village indigène de Salmon Bay vit ses derniers instants. Bientôt, le littoral cédera, la baie l'engloutira. En attendant la barge chargée de les mener au nouveau site, les habitants disent adieu à la terre – cette terre où plane l'esprit des ancêtres, cette boue où les petites filles dessinent des histoires... Adieu à la toundra pelée, à la station de radio locale où Jo-Jo, le DJ, passe sans fin des vieux disques, aux chemins de planches et aux mélopées yupik... Tyler, le premier esquimau de la planète allergique au froid, Dennis dit " l'Embrouille ", Angelic, Panika, Josh, Junior et les autres – tous sentent pourtant que Salmon Bay n'a pas dit son dernier mot. Avant la grande traversée, pour le meilleur peut-être, le village leur réserve un cataclysmique chant du départ.../p>
                <p id="episodes">Don Rearden</p>
                <hr/>
            </div>
        </div>
    </section>

    <section>
        <div class='row'>
            <div class="col-xs-12">
                <h3>Liste des articles</h3>
                <hr/>
                <table class="table table-hover" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Date de publication</th>
                        <th>Articles</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td>
                                <time style="color:grey; font-size: 0.8em"><i><?= $article['date_fr'] ?></i></time>
                            </td>
                            <td>
                                <a href="<?= "index.php?action=article&art_id=" . $article['art_id'] ?>">
                                    <p class="titreArticle"><?= htmlspecialchars($article['art_title']) ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                <br/>
            </div>
        </div>

    </section>
</div>
