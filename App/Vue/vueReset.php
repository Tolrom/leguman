<?php ob_start() ?>
<main id="reset">
    <a href="/leguman/utilisateur/login" class="backBouton">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
            <circle cx="20" cy="20" r="20" fill="#96C11F" />
            <path
                d="M31 21.5C31.8284 21.5 32.5 20.8284 32.5 20C32.5 19.1716 31.8284 18.5 31 18.5V21.5ZM8.93934 18.9393C8.35355 19.5251 8.35355 20.4749 8.93934 21.0607L18.4853 30.6066C19.0711 31.1924 20.0208 31.1924 20.6066 30.6066C21.1924 30.0208 21.1924 29.0711 20.6066 28.4853L12.1213 20L20.6066 11.5147C21.1924 10.9289 21.1924 9.97919 20.6066 9.3934C20.0208 8.80761 19.0711 8.80761 18.4853 9.3934L8.93934 18.9393ZM31 18.5L10 18.5V21.5L31 21.5V18.5Z"
                fill="#593500" />
        </svg>
    </a>
    <h2>Mot de passe oublié ?</h2>
    <form method="post" id="formReset">
        <label for="mail_utilisateur">Email :</label>
        <input type="email" name="mail_utilisateur">
        <input class="bouton" type="submit" value="Récupérer" name="reset">
    </form>
</main>
<p>
    <?= $error ?>
</p>
<?php $content = ob_get_clean() ?>