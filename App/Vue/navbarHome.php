<?php ob_start() ?>
<?php if (isset($_SESSION['connected'])): ?>
    <!-- Bouton burger -->
    <div id="burgerBox" class="burgerBouton">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="25" viewBox="0 0 42 25" fill="none" id="burgerIndex">
            <line y1="1.5" x2="41.25" y2="1.5" stroke="#96C11F" stroke-width="3" />
            <line y1="12.5" x2="41.25" y2="12.5" stroke="#96C11F" stroke-width="3" />
            <line y1="23.5" x2="41.25" y2="23.5" stroke="#96C11F" stroke-width="3" />
        </svg>
    </div>
    <!-- La nav en burger -->
    <nav style="transform : translateX(-60vw)">
        <svg id="croixNav" xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <line x1="31.0607" y1="1.06066" x2="2.06066" y2="30.0607" stroke="black" stroke-width="3" />
            <line y1="-1.5" x2="41.0122" y2="-1.5" transform="matrix(0.707107 0.707107 0.707107 -0.707107 3 0)"
                stroke="black" stroke-width="3" />
        </svg>
        <ul>
            <li><a href="/leguman/shop">Les paniers</a></li>
            <li><a href="/leguman/aboutUs">Notre production</a></li>
            <li><a href="/leguman/contact">Nous contacter</a></li>
            <li><a href="/leguman/utilisateur/infos">Espace client</a></li>
            <span class="separateur"></span>
            <li><a href="/leguman/mentions">Mentions légales</a></li>
            <li><a href="/leguman/cgv">CGV</a></li>
        </ul>
        <a href="/leguman/utilisateur/logout" class="bouton">Deconnexion</a>
    </nav>
    <!-- Le bouton de panier -->
    <div id="shopBouton" class="cartBouton">
        <img src="/leguman/Public/asset/images/shopColor.svg" alt="Logo de panier">
    </div>
    <!-- Le menu panier déroulant -->
    <div id="shop" style="transform : translateX(60vw)">
        <svg id="croixShop" xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <line x1="31.0607" y1="1.06066" x2="2.06066" y2="30.0607" stroke="black" stroke-width="3" />
            <line y1="-1.5" x2="41.0122" y2="-1.5" transform="matrix(0.707107 0.707107 0.707107 -0.707107 3 0)"
                stroke="black" stroke-width="3" />
        </svg>
        <div class="bouton">Passer commande</div>
    </div>
    <!-- Le header -->
    <header id="indexHeader">
        <div id="titre">
            <h1>LÉGUM<img src="/leguman/Public/asset/images/logobis.svg" alt="Une carotte formant le A de Léguman"
                    id="logoTitre">N
            </h1>
            <h6>Légumes sains du jardin</h6>
        </div>
        <a href="/leguman/shop" class="bouton">Réserver un panier</a>
    </header>
<?php else: ?>
    <!-- Bouton burger -->
    <div id="burgerBox" class="burgerBouton">
        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="25" viewBox="0 0 42 25" fill="none" id="burgerIndex">
            <line y1="1.5" x2="41.25" y2="1.5" stroke="#96C11F" stroke-width="3" />
            <line y1="12.5" x2="41.25" y2="12.5" stroke="#96C11F" stroke-width="3" />
            <line y1="23.5" x2="41.25" y2="23.5" stroke="#96C11F" stroke-width="3" />
        </svg>
    </div>
    <!-- La nav en burger -->
    <nav style="transform : translateX(-60vw)">
        <svg id="croixNav" xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <line x1="31.0607" y1="1.06066" x2="2.06066" y2="30.0607" stroke="black" stroke-width="3" />
            <line y1="-1.5" x2="41.0122" y2="-1.5" transform="matrix(0.707107 0.707107 0.707107 -0.707107 3 0)"
                stroke="black" stroke-width="3" />
        </svg>
        <ul>
            <li><a href="/leguman/shop">Les paniers</a></li>
            <li><a href="/leguman/aboutUs">Notre production</a></li>
            <li><a href="/leguman/contact">Nous contacter</a></li>
            <li><a href="/leguman/utilisateur/infos">Espace client</a></li>
            <span class="separateur"></span>
            <li><a href="/leguman/mentions">Mentions légales</a></li>
            <li><a href="/leguman/cgv">CGV</a></li>
        </ul>
        <a href="/leguman/utilisateur/login" class="bouton">Connexion</a>
        <a href="/leguman/utilisateur/add" class="bouton">Inscription</a>
    </nav>
    <!-- Le bouton de panier -->
    <div id="shopBouton" class="cartBouton">
        <img src="/leguman/Public/asset/images/shopColor.svg" alt="Logo de panier">
    </div>
    <!-- Le menu panier déroulant -->
    <div id="shop" style="transform : translateX(60vw)">
        <svg id="croixShop" xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
            <line x1="31.0607" y1="1.06066" x2="2.06066" y2="30.0607" stroke="black" stroke-width="3" />
            <line y1="-1.5" x2="41.0122" y2="-1.5" transform="matrix(0.707107 0.707107 0.707107 -0.707107 3 0)"
                stroke="black" stroke-width="3" />
        </svg>
        <div class="bouton">Passer commande</div>
    </div>
    <!-- Le header -->
    <header id="indexHeader">
        <div id="titre">
            <h1>LÉGUM<img src="/leguman/Public/asset/images/logobis.svg" alt="Une carotte formant le A de Léguman"
                    id="logoTitre">N
            </h1>
            <h6>Légumes sains du jardin</h6>
        </div>
        <a href="/leguman/shop" class="bouton">Réserver un panier</a>
    </header>
<?php endif; ?>
<?php $navbar = ob_get_clean() ?>