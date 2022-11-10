<section>
    <div class="container card bg-light mt-3 p-3">
        <h1>Catégories</h1>
        <?php if (!empty($categories)) { ?>
            <div class="list-group border-top-0">
                <?php foreach ($categories as $key => $c) { ?>
                    <a href="?page=categorie&categorie=<?= $c['id']; ?>" class="list-group-item list-group-item-action">
                        <?= $c['nom']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h3>Il n'y a aucunes catégories</h3>
        <?php } ?>
    </div>
</section>