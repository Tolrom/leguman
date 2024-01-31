<?php ob_start() ?>
<h2>INSCRIPTION :</h2>
<form method="post" id="formConnexion">
    <label class="required" for="nom_utilisateur">Nom :</label>
    <input type="text" name="nom_utilisateur">
    <label class="required" for="prenom_utilisateur">Prénom :</label>
    <input type="text" name="prenom_utilisateur">
    <label class="required" for="email_utilisateur">Email :</label>
    <input type="email" name="email_utilisateur">
    <label for="phone_utilisateur">Téléphone :</label>
    <input type="tel" name="phone_utilisateur" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
    <label class="required" for="password_utilisateur">Mot de passe :</label>
    <input type="password" name="password_utilisateur">
    <label class="required" for="password_confirm">Confirmer :</label>
    <input type="password" name="password_confirm">
    <input class="bouton" type="submit" value="Ajouter" name="submit">
</form>
<p>
    <?= $error ?>
</p>
<?php $content = ob_get_clean() ?>