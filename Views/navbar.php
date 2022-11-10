<nav class="navbar navbar-expand-lg navbar-light bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="?page">La Boutique</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?=$_GET['page'] == '' ? 'active' : '';?>" aria-current="page" href="?page">Produits</a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=$_GET['page'] == 'categories' || $_GET['page'] == 'categorie' ? 'active' : '';?>" href="?page=categories">Catégories</a>
                </li>
                <?php if (UserController::isAdmin()) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?=$_GET['page'] == 'utilisateurs' || $_GET['page'] == 'utilisateur' ? 'active' : '';?>" href="?page=utilisateurs">Utilisateurs</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?=$_GET['page'] == 'connexion' || $_GET['page'] == 'inscription' ? 'active' : '';?>" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <?php if (!empty($_SESSION['user'])) { ?>
                            <li><a class="dropdown-item" href="?page=deconnexion">Déconnexion</a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="?page=connexion">Connexion</a></li>
                            <li><a class="dropdown-item" href="?page=inscription">Inscription</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>