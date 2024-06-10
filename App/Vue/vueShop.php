<?php ob_start() ?>
<section id="paniers">
    <h2>LES PANIERS</h2>
    <?php foreach ($data as $produit): ?>
        <a href="/leguman/shop/produit?id=<?= $produit["id_produit"] ?>" class="panier">
            <?= $produit["nom_produit"] ?> <br>
            <?= $produit["prix_produit"] ?>€
        </a>
    <?php endforeach ?>
</section>
<p>
    <?= $error ?>
</p>
<?php $content = ob_get_clean() ?>



