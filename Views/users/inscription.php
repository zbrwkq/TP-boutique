<section>
    <div class="container card bg-light mt-3 p-3">
        <h1>Inscription</h1>
        <form action="" method="post">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?=$email;?>">
            <label for="pseudo" class="form-label">Pseudonyme</label>
            <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?=$pseudo;?>">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" name="mdp" id="mdp" class="form-control">
            <input type="password" name="mdpAgain" id="mdpAgain" class="form-control">
            <p>
                <a href="?page=connexion">Déjà inscrit ?</a>
            </p>
            <button type="submit" name="action" value="insert" class="btn btn-primary mt-3">Envoyer</button>
        </form>
    </div>
</section>