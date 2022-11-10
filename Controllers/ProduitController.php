<?php
class ProduitController extends ProduitManager
{

    /**
     * Récupère la liste des produits
     * 
     */
    public function getProduits()
    {
        ob_start();

        $produits =  $this->findAll();


        if (UserController::isAdmin()) {
            $getCategories = new CategorieManager();
            $categories = $getCategories->findAll();
            require 'Views/produits/addForm.php';
        }

        require 'Views/produits/list.php';

        return ob_get_clean();
    }
    /**
     * Récupère les infos d'un produit
     * 
     */
    public function getProduit($id)
    {
        ob_start();

        $produit =  $this->findById($id);
        // si aucun produit trouvé affiche message
        if (!$produit) {
            $title = 'Produit';
            require 'Views/notFound.php';
        } else {
            // recupere categorie associée
            $manager = new CategorieManager();
            $currentCategorie = $manager->findById($produit['categorie']);
            if (!$currentCategorie){
                // si aucune catégorie n'est trouvé met le nom à null
                $currentCategorie['nom'] = null;
            }else{
                // sinon récupère des produits d'exemple de la meme catégorie
                $exampleProducts = $this->findExamplesByCategorie($produit['categorie']);
            }


            // permet de modifier le produit si l'utilisateur est administrateur
            if (UserController::isAdmin()) {
                $categories = $manager->findAll();
                require 'Views/produits/edit.php';
            } else {
                require 'Views/produits/details.php';
            }
            
            // liste à ne pas afficher si il n'y a aucun produits
            require 'Views/categories/productExample.php';
        }

        return ob_get_clean();
    }

    /**
     * verfication avant insertion
     * 
     * @return array un tableau de réponse
     */
    public function save(array $data)
    {
        if ($this->isFormValid($data)) {
            if ($_POST['categorie'] == "") {
                $categorie = null;
            } else {
                $categorie = $_POST['categorie'];
            }
            $this->insert($data['nom'], $data['description'], $data['prix'], $categorie);
            return [
                'type' => 'success',
                'content' => 'Produit ajouté'
            ];
        } else {
            return [
                'type' => 'warning',
                'content' => 'Vérifiez que tous les champs ont bien été remplis'
            ];
        }
    }
    /**
     * Vérification avant la mise à jour du produit
     * 
     * @return array Une reponse sous form de tableau
     */
    public function update(array $data)
    {
        if ($this->isFormValid($data) && !empty($data['id'])) {
            if ($_POST['categorie'] == "") {
                $categorie = null;
            } else {
                $categorie = $_POST['categorie'];
            }
            $this->put($data['id'], $data['nom'], $data['description'], $data['prix'], $data['qte'], $categorie);
            return [
                'type' => 'success',
                'content' => 'Produit mis à jour'
            ];
        } else {
            return [
                'type' => 'warning',
                'content' => 'Vérifiez que tous les champs sont correctement remplis'
            ];
        }
    }

    /**
     * Vérification avant la suppression 
     * 
     * @return array une reponse sous forrme de tableau
     */
    public function delete(array $data)
    {
        if (!empty($data['id']))
            $this->drop($data['id']);
        return [
            'type' => 'danger',
            'content' => "Le produit à bien été supprimé"
        ];
    }
    public function isFormValid(array $data): bool
    {
        if (empty($data['nom']) || empty($data['description']) || empty($data['prix']) || !isset($data['categorie'])) {
            return false;
        }
        return true;
    }
}
