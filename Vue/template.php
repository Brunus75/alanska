<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/css/style.css"/>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8g7evice28ijhltakt3luahte0zosph29ssbyctldxg17bhi"></script>

    <script> tinymce.init({ selector:'textarea' }); </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <title><?= $art_title ?></title>
</head>
<body>

<div class="container-fluid">


    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href=" <?= "index.php#presentation" ?>"><b>Un Dimanche Soir en Alaska
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href=" <?= "index.php" ?>">Accueil</a></li>
                    <li><a href="<?= "index.php#episodes" ?>">Liste des articles</a></li>
                </ul>
                <?php
                if (isset($_SESSION['UserRepository'])) {
                    echo '<ul>';
                    echo '<div class="nav navbar-nav navbar-right">';
                    echo '<li><a href="' . "index.php?action=adminAccueil" . '">Page Administration';
                    echo '<li><a href="' . "index.php?action=deconnexion" . '">Déconnexion';
                    echo '</a></li>';
                    echo '</div>';
                    echo '</ul>';
                } ?>

            </div>
        </div>
    </nav>


    <div id="flash"><?= $_SESSION['flash'] ?></div>


    <div id="com_content">
        <?= $art_content ?>
    </div>


</div>

<footer id="footer" style="background: black">
    <p><a href="<?= "index.php?action=authentification" ?>">Espace Administrateur</a></p>
</footer>

</body>
</html>
