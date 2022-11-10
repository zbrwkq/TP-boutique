<section>
    <!-- nav buttons -->
    <div class="nav nav-pills me-1 d-none" role="tablist">
        <button class="btn btn-secondary" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="profile" aria-selected="false" id="btnToDetails"></button>
        <button class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#edit" type="button" role="tab" aria-controls="profile" aria-selected="false" id="btnToEdit"></button>
    </div>
    <div class="container mt-3">
        <div class="card p-3 bg-light tab-content">
            <!-- panel read -->
            <div class="tab-pane show active" id="details" role="tabpanel">
                <label class="btn btn-primary float-end" for="btnToEdit"><i class="bi bi-pencil-square"></i></label>
                <h1><?= $user['pseudo']; ?></h1>
                <h3><?=$user['email'];?></h3>
                <p><?= $user['role']; ?></p>
            </div>
            <!-- panel update -->
            <div class="tab-pane" id="edit" role="tabpanel">
                <form action="" method="post" class="float-end">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <button type="submit" name="action" value="delete" class="btn btn-outline-danger"><i class="bi bi-trash3-fill"></i></button>
                </form>
                <form action="" method="post" class="mt-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $user['email']; ?>">
                    <label for="pseudo" class="form-label">Pseudonyme</label>
                    <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?= $user['pseudo']; ?>">
                    <label for="role" class="form-label">Rôle</label>
                    <select name="role" id="role" class="form-control">
                        <option value="default" <?=$user['role'] == 'default' ? 'selected' : '';?>>rôle par défaut</option>
                        <option value="admin" <?=$user['role'] == 'admin' ? 'selected' : '';?>>administrateur</option>
                    </select>
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <div class="d-flex mt-3" role="group">
                        <label class="btn btn-secondary me-1" for="btnToDetails">Annuler</label>
                        <button type="submit" name="action" value="update" class="btn btn-success">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>