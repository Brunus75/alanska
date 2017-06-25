<br/>
<h3 id="titreReponses">Ecrire un commentaire </h3>
<br>
                    <form method="post" action="<?= "index.php?action=commenter" ?>">
                        <input id="com_author" name="com_author" type="text" class="form-control"
                               placeholder="Auteur" required><br/>
                        <textarea id="txtCommentaire" name="com_content" rows="4" class="form-control" placeholder="Commentaire" required> </textarea><br/>
                        <input type="hidden" name="art_id" value="<?= $article['art_id'] ?>"/>
                        <input class="btn btn-primary" style="margin-left:50px; float: right" type="submit"
                               name="action" value="Valider"/>
                    </form>
<br/>
<br/>
<hr/>