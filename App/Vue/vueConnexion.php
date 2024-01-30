<?php ob_start() ?>
<main id="login">
    <h2>Se connecter :</h2>
    <form method="post" id="formConnexion">
        <label for="mail_utilisateur">Email :</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Mot de passe :</label>
        <input type="password" name="password_utilisateur">
        <a href="/leguman/utilisateur/reset" id="forgot">Mot de passe oublié ?</a>
        <input class="bouton" type="submit" value="Connexion" name="submit">
    </form>
</main>
<p>
    <?= $error ?>
</p>
<?php $content = ob_get_clean() ?>