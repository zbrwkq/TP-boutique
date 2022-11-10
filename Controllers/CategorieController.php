<?php
class CategorieController extends CategorieManager
{

    /**
     * Récupère la liste des categories
     * 
     */
    public function getCategories()
    {
        ob_start();

        $categories =  $this->findAll();

        if (UserController::isAdmin()){
            require 'Views/categories/addForm.php';
        }

        require 'Views/categories/list.php';

        return ob_get_clean();
    }
    /**
     * Récupère les infos d'un categorie
     * 
     */
    public function getCategorie($id)
    {
        ob_start();

        $categorie =  $this->findById($id);
        
        // si aucune catégorie trouvé affiche un message
        if(!$categorie){
            $title = 'Catégorie';
            require 'Views/notFound.php';
        }else {
            $manager = new ProduitManager();
            $produits = $manager->findByCategorie($categorie['id']);
            if (UserController::isAdmin()){
                require 'Views/categories/edit.php';
                require 'Views/produits/list.php';
            }else{
                require 'Views/categories/details.php';
                require 'Views/produits/list.php';
            }
        }



        return ob_get_clean();
    }

    public function save(array $data) : array
    {
        if ($this->isFormValid($data)) {
            $this->insert($data['nom'], $data['description']);
            return [
                'type' => 'success',
                'content' => 'Catégorie ajoutée'
            ];
        }else{
            return [
                'type' => 'warning',
                'content' => 'Vérifiez que tous les champs sont correctement remplis'
            ];
        }
    }
    public function update(array $data) : array
    {
        if ($this->isFormValid($data) && !empty($data['id'])) {
            $this->put($data['id'], $data['nom'], $data['description']);
            return [
                'type' => 'success',
                'content' => 'Catégorie mise à jour'
            ];
        }else{
            return [
                'type' => 'warning',
                'content' => 'Vérifiez que tous les champs sont correctement remplis'
            ];
        }
    }
    public function delete(array $data) : array
    {
        if (!empty($data['id']))
            $this->drop($data['id']);
            return [
                'type' => 'danger',
                'content' => "La catégorie à bien été supprimée"
            ];
    }
    public function isFormValid(array $data): bool
    {
        if (empty($data['nom']) || empty($data['description'])) {
            return false;
        }
        return true;
    }
}
