<section>
    <div class="container card bg-light mt-3 p-3">
        <h1>Ajouter un produit</h1>
        <form action="" method="post">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="1" rows="2" class="form-control"></textarea>
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="categorie" id="categorie" class="form-control">
                <option value="">Choisir une catégorie</option>
                <?php foreach ($categories as $categorie) { ?>
                    <option value="<?=$categorie['id'];?>"><?=$categorie['nom'];?></option>
                <?php } ?>
            </select>
            <button type="submit" name="action" value="insert" class="btn btn-primary mt-3">Envoyer</button>
        </form>
    </div>
</section>