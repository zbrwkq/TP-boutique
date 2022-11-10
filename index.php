<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<?php
require_once 'Class/Autoload.php';
Autoload::load();
session_start();
?>

<body style="min-height: 100vh;">

    <?php
    // affichage de la navbar
    require_once 'Views/navbar.php';
    // initialisation de la variable des alertes
    $alerts = [];
    ?>
    <div class="container position-relative pt-3 pb-3">
        <?php
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'produit':
                    // verifie qu'il y a un id à récupérer et redirige sinon
                    if (!empty($_GET['produit'])) {
                        $ctrl = new ProduitController();
                        // verifie que l'utilisateur est administrateur avant les actions
                        if (UserController::isAdmin()) {
                            if (!empty($_POST['action'])) {
                                switch ($_POST['action']) {
                                    case 'update':
                                        $alerts[] = $ctrl->update($_POST);
                                        break;
                                    case 'delete':
                                        $alerts[] = $ctrl->delete($_POST);
                                        header('refresh: 2, ?page');
                                        break;
                                }
                            }
                        }

                        echo $ctrl->getProduit($_GET['produit']);
                    } else {
                        header('location:?page');
                    }
                    break;
                case 'categories':
                    $ctrl = new CategorieController;

                    // verifie que l'utilisateur est administrateur avant les actions
                    if (UserController::isAdmin()) {
                        if (!empty($_POST['action'])) {
                            switch ($_POST['action']) {
                                case 'insert':
                                    $alerts[] = $ctrl->save($_POST);
                                    break;
                            }
                        }
                    }

                    echo $ctrl->getCategories();
                    break;

                case 'categorie':
                    // verifie qu'il y a un id à récupérer et redirige sinon
                    if (!empty($_GET['categorie'])) {
                        $ctrl = new CategorieController();

                        // verifie que l'utilisateur est administrateur avant les actions
                        if (UserController::isAdmin()) {
                            if (!empty($_POST['action'])) {
                                switch ($_POST['action']) {
                                    case 'update':
                                        $alerts[] = $ctrl->update($_POST);
                                        break;
                                    case 'delete':
                                        $alerts[] = $ctrl->delete($_POST);
                                        header('refresh: 2, ?page=categories');
                                        break;
                                }
                            }
                        }

                        echo $ctrl->getCategorie($_GET['categorie']);
                    } else {
                        header('location:?page');
                    }
                    break;

                case 'inscription':
                    $ctrl = new UserController();

                    if (!empty($_POST['action'])) {
                        switch ($_POST['action']) {
                            case 'insert':
                                $reponse = $ctrl->inscription($_POST);
                                if($reponse['type'] == 'success'){
                                    $ctrl->connexion($_POST);
                                    $alerts[] = $reponse;
                                    header('refresh: 2, ?page');
                                }else{
                                    $alerts[] = $reponse;
                                }
                                break;
                        }
                    }
                    echo $ctrl->getInscription($_POST);

                    break;

                case 'connexion':
                    $ctrl = new UserController();

                    if (!empty($_POST['action'])) {
                        switch ($_POST['action']) {
                            case 'login':
                                $reponse = $ctrl->connexion($_POST);

                                if ($reponse['type'] == 'success')
                                    header('location:?page');
                                else
                                    $alerts[] = $reponse;
                                break;
                        }
                    }
                    echo $ctrl->getConnexion();

                    break;
                case 'deconnexion':
                    $ctrl = new UserController();

                    $ctrl->deconnexion();

                    header('location:?page=connexion');

                    break;

                case 'utilisateurs':
                    // redirige si l'utilisateur n'est pas administrateur
                    if (!UserController::isAdmin())
                        header('location:?page');

                    $ctrl = new UserController();
                    echo $ctrl->getUsers();

                    break;

                case 'utilisateur':
                    // redirige si l'utilisateur n'est pas administrateur
                    if (!UserController::isAdmin())
                        header('location:?page');

                    // verifie qu'il y a un id à récupérer et redirige sinon
                    if (!empty($_GET['utilisateur'])) {
                        $ctrl = new UserController();

                        if (!empty($_POST['action'])) {
                            switch ($_POST['action']) {
                                case 'update':
                                    $alerts[] = $ctrl->update($_POST);
                                    break;
                                case 'delete':
                                    $alerts[] = $ctrl->delete($_POST);
                                    header('refresh: 2, ?page=utilisateurs');
                                    break;
                            }
                        }

                        echo $ctrl->getUser($_GET['utilisateur']);
                    } else {
                        header('location:?page');
                    }

                    break;

                default:
                    $ctrl = new ProduitController();

                    // verifie que l'utilisateur est administrateur avant les actions
                    if (UserController::isAdmin()) {
                        if (!empty($_POST['action'])) {
                            switch ($_POST['action']) {
                                case 'insert':
                                    $alerts[] = $ctrl->save($_POST);

                                    break;
                            }
                        }
                    }

                    echo $ctrl->getProduits();
                    break;
            }
        } else {
            // 404
            header('location:?page');
        }


        require_once 'Views/displayAlerts.php';
        ?>
    </div>  
    
    <!-- <div class="text-align-center w-100 mt-3 p-3 bg-light text-center">
        Créé par Damien Chauveau 2022 &#169. Tout droit réservés
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>