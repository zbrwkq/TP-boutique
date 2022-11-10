<section>
    <!-- nav buttons -->
    <div class="nav nav-pills me-1 d-none" role="tablist">
        <button class="btn btn-secondary" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="profile" aria-selected="false" id="btnToDetails"></button>
        <button class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#edit" type="button" role="tab" aria-controls="profile" aria-selected="false" id="btnToEdit"></button>
    </div>
    <div class="container mt-3 card p-3 bg-light tab-content">
        <!-- panel read -->
        <div class="tab-pane show active" id="details" role="tabpanel">
            <label class="btn btn-primary float-end" for="btnToEdit"><i class="bi bi-pencil-square"></i></label>
            <h1><?= $produit['nom']; ?></h1>
            <p><?= $produit['description']; ?></p>
            <p><?= $produit['prix']; ?>€</p>
            <p>stock : <?= $produit['qte']; ?></p>
        </div>
        <!-- panel update -->
        <div class="tab-pane" id="edit" role="tabpanel">
            <form action="" method="post" class="float-end">
                <input type="hidden" name="id" value="<?= $produit['id']; ?>">
                <button type="submit" name="action" value="delete" class="btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></button>
            </form>
            <form action="" method="post" class="mt-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?= $produit['nom']; ?>">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="2" class="form-control"><?= $produit['description']; ?></textarea>
                <label for="prix" class="form-label">Prix</label>
                <input type="number" id="prix" name="prix" class="form-control" value="<?= $produit['prix']; ?>">
                <label for="qte" class="form-label">Quantité</label>
                <input type="number" id="qte" name="qte" class="form-control" value="<?= $produit['qte']; ?>">
                <input type="hidden" name="id" value="<?= $produit['id']; ?>">
                <label for="categorie" class="form-label">Catégories</label>
                <select name="categorie" id="categorie" class="form-control">
                    <option value="">Sans catégorie</option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?=$categorie['id'];?>" <?=$categorie['id'] == $produit['categorie'] ? 'selected' : '';?>><?=$categorie['nom'];?></option>
                    <?php } ?>
                </select>
                <div class="d-flex mt-3" role="group">
                    <label class="btn btn-secondary me-1" for="btnToDetails">Annuler</label>
                    <button type="submit" name="action" value="update" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</section>