<?php
class UserController extends UserManager
{

    /**
     * Récupère la vue d'inscription
     * 
     */
    public function getInscription($data)
    {

        ob_start();

        $email = "";
        if(!empty($_POST['email']))
            $email = $_POST['email'];
        $pseudo = "";
        if(!empty($_POST['pseudo']))
            $pseudo = $_POST['pseudo'];
        require 'Views/users/inscription.php';

        return ob_get_clean();
    }
    /**
     * Récupère la vue de connexion
     * 
     */
    public function getConnexion()
    {

        ob_start();

        require 'Views/users/connexion.php';

        return ob_get_clean();
    }

    public function inscription($data){
        if($this->isLoginFormValid($data) && !empty($data['pseudo']) && !empty($data['mdpAgain'])){
            if( strlen($data['mdp']) >= 8 ){
                if($data['mdp'] == $data['mdpAgain']){
                    if(!$this->alreadyExist($data['email'])){
                        $this->insert($data['email'], password_hash($data['mdp'], PASSWORD_BCRYPT), 'default', $data['pseudo']);
                        return [
                            'type' => 'success',
                            'content' => 'Vous êtes inscrit.'
                        ];
                    }
                    return [
                        'type' => 'warning',
                        'content' => 'L\'adresse mail spécifiée à déjà été uttilisée.'
                    ];
                }
                return [
                    'type' => 'warning',
                    'content' => 'Les mots de passes doivent être identiques.'
                ];
            }
            return [
                'type' => 'warning',
                'content' => 'Le mot de passe doit faire au moins 8 caractères.'
            ];
        }
        return [
            'type' => 'warning',
            'content' => 'Vérifiez que tous les champs sont correctement remplis'
        ];
    }

    /**
     * verifie les identiiants donnés
     * 
     * @return une reponse sous forme de tableau
     */
    public function connexion(array $data) : array{
        if($this->isLoginFormValid($data)){
            if( strlen($data['mdp']) >= 8 ){
                if($this->alreadyExist($data['email'])){
                    $user = $this->findByEmail($data['email']);
                    if(password_verify($data['mdp'], $user['mdp'])){
                        $_SESSION['user'] = $user;
                        return [
                            'type' => 'success',
                            'content' => 'Vous êtes connecté.'
                        ];
                    }
                }
                return [
                    'type' => 'warning',
                    'content' => 'Mot de passe ou adresse mail incorrect.'
                ];
            }
            return [
                'type' => 'warning',
                'content' => 'Le mot de passe doit au moins faire 8 caractères.'
            ];
        }
        return [
            'type' => 'warning',
            'content' => 'Vérifiez que tous les champs sont correctement remplis.'
        ];

    }

    /**
     * déconnecte l'utilisateur actuel
     */
    public function deconnexion(){
        unset($_SESSION);
        session_destroy();
    }

    /**
     * Récupère la liste des users
     * 
     */
    public function getUsers()
    {
        ob_start();

        $users =  $this->findAll();

        require 'Views/users/list.php';

        return ob_get_clean();
    }
    /**
     * Récupère les infos d'un user
     * 
     */
    public function getUser($id)
    {
        ob_start();

        $user =  $this->findById($id);

        // si aucune catégorie trouvé affiche un message
        if(!$user){
            $title = 'Utilisateur';
            require 'Views/notFound.php';
        }else {

        require 'Views/users/edit.php';
        }

        return ob_get_clean();
    }
    /**
     * Vérification avant update 
     * 
     * @return array Une réponse sous forme tableau
     */
    public function update(array $data)
    {
        if (!empty($data['id']) && !empty($data['email']) && !empty($data['role']) && !empty($data['pseudo'])) {
            $this->put($data['id'], $data['email'], $_POST['role'], $_POST['pseudo']);
            return [
                'type' => 'success',
                'content' => 'Utilisateur mis à jour'
            ];
        }else{
            return [
                'type' => 'warning',
                'content' => 'Vérifiez que tous les champs sont correctement remplis'
            ];
        }
    }

    /**
     * Vérification avant la suppression du produit
     *
     * @return tableau de réponse 
     */
    public function delete(array $data)
    {
        if (!empty($data['id']))
            $this->drop($data['id']);
        return [
            'type' => 'danger',
            'content' => "L'utilisateur à bien été supprimé"
        ];
    }
    public function isLoginFormValid(array $data): bool
    {
        if (empty($data['email']) || empty($data['mdp'])) {
            return false;
        }
        return true;
    }

    /**
     * check if the logged in user is an administrator
     * 
     * @return bool return true if the user is an administrator
     */
    public static function isAdmin() : bool{
        if(!empty($_SESSION['user']))
            if($_SESSION['user']['role'] == 'admin')
                return true;
        return false;        
    }
}
