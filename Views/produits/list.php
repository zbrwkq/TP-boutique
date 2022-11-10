<section>
    <div class="container card bg-light mt-3 p-3">
        <h1>Produits</h1>
        <?php if (!empty($produits)) { ?>
            <div class="list-group border-top-0">
                <?php foreach ($produits as $key => $p) { ?>
                    <a href="?page=produit&produit=<?= $p['id']; ?>" class="list-group-item list-group-item-action">
                        <?= $p['nom']; ?>
                        <span class="float-end"><?=$p['prix'];?>€</span>
                    </a>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h3>Il n'y a aucun produit</h3>
        <?php } ?>
    </div>
</section>