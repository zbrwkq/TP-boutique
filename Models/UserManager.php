<?php
class UserManager extends BDD
{
    /**
     * find all
     */
    public function findAll()
    {
        $select = $this->co->prepare('
            SELECT * FROM users
        ');
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * find with id
     */
    public function findById($id)
    {
        $select = $this->co->prepare('
            SELECT * FROM users
                WHERE id = ?
        ');
        $select->execute([$id]);
        return $select->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * find with email
     */
    public function findByEmail(string $email)
    {
        $select = $this->co->prepare('
            SELECT * FROM users
                WHERE email = ?
        ');
        $select->execute([$email]);
        return $select->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * insert a produit
     */
    public function insert(string $email, string $mdp, string $role, string $pseudo)
    {
        $insert = $this->co->prepare('
            INSERT INTO users(email, mdp, role, pseudo)
                VALUES(?,?,?,?)
        ');
        $insert->execute([$email, $mdp, $role, $pseudo]);
    }

    /**
     * update a produit
     */
    public function put(int $id, string $email, string $role, string $pseudo)
    {
        $insert = $this->co->prepare('
            UPDATE users SET
                email = ?,
                role = ?,
                pseudo = ?
                WHERE id = ?
        ');
        $insert->execute([$email, $role, $pseudo, $id]);
    }
    /**
     * delete a produit
     */
    public function drop(int $id)
    {
        $insert = $this->co->prepare('
            DELETE FROM users WHERE id = ?
        ');
        $insert->execute([$id]);
    }
    /**
     * check if the email already exists
     */
    public function alreadyExist($email){
        $select = $this->co->prepare('
            SELECT COUNT(*) FROM users
                WHERE email = ?
        ');
        $select->execute([$email]);
        return ($select->fetch(PDO::FETCH_ASSOC)['COUNT(*)'] > 0);
    }
}
