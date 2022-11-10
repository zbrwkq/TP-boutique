<section>
    <div class="container card bg-light mt-3 p-3">
        <h1>Utilisateurs</h1>
        <?php if (!empty($users)) { ?>
            <div class="list-group border-top-0">
                <?php foreach ($users as $key => $u) { ?>
                    <a href="?page=utilisateur&utilisateur=<?= $u['id']; ?>" class="list-group-item list-group-item-action">
                        <?= $u['pseudo']; ?>
                        <span class="float-end"><?=$u['role'];?></span>
                    </a>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h3>Il n'y a aucun produit</h3>
        <?php } ?>
    </div>
</section>