<?php if(!empty($exampleProducts)){ ?>
    <section>
        <div class="container card bg-light mt-3 p-3">
            <h1><?=$currentCategorie['nom'];?> <span class="fs-4">Produit de la même catégorie</span></h1>
            <?php foreach ($exampleProducts as $exampleProduct) {?>
                <a href="?page=produit&produit=<?= $exampleProduct['id']; ?>" class="list-group-item list-group-item-action">
                        <?= $exampleProduct['nom']; ?>
                        <span class="float-end"><?=$exampleProduct['prix'];?>€</span>
                    </a>
            <?php } ?>
        </div>
    </section>
<?php } ?>
    