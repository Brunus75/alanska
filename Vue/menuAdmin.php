<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <p class="navbar-brand"><b>Page d'administration</b></p>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=adminAccueil" ?>">Articles</a></li>
                <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=adminCommentaires" ?>">Commentaires</a></li>
                <li><a style="padding-left: 50px; width: 20%;" href=" <?= "index.php?action=membres" ?>">Membres</a></li>
            </ul>
        </div>

    </div>

</nav>