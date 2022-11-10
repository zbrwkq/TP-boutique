<section>
    <div class="container card bg-light mt-3 p-3">
        <h1><?= $produit['nom'];?></h1>
        <p><?= $produit['description']; ?></p>
        <p><?= $produit['prix']; ?>€</p>
        <p>stock : <?= $produit['qte']; ?></p>
    </div>
</section>