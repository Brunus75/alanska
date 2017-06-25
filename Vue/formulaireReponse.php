<br/>
<h3 id="titreReponses">Réponse à un commentaire</h3>
<br>
<form method="post" action="<?= "index.php?action=repondre" ?>">
    <input id="com_author" name="com_author" type="text" class="form-control"
           placeholder="Auteur" required><br/>
    <textarea id="txtCommentaire" name="com_content" rows="4" class="form-control" placeholder="Commentaire" required> </textarea><br/>
    <input type="hidden" name="com_id" value="<?= $commentaire['com_id'] ?>"/>
    <input type="hidden" name="art_id" value="<?= $commentaire['art_id'] ?>"/>
    <input type="hidden" name="parent_id" value="<?= $commentaire['parent_id'] ?>"/>
    <input type="hidden" name="com_niveau" value="<?= $commentaire['com_niveau'] ?>"/>
    <input class="btn btn-success" style="margin-left:50px; float: right" type="submit"
           name="action" value="Valider"/>
</form>
<br/>
<br/>
<hr/>


