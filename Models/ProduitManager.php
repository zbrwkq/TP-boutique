<?php
class ProduitManager extends BDD
{
    /**
     * find all
     */
    public function findAll()
    {
        $select = $this->co->prepare('
            SELECT * FROM produits
        ');
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * find examples product from categorie
     */
    public function findExamplesByCategorie(int $categorie)
    {
        $select = $this->co->prepare('
            SELECT * FROM produits
                WHERE categorie = ?
            LIMIT 4
        ');
        $select->execute([$categorie]);
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * find with id
     */
    public function findById($id)
    {
        $select = $this->co->prepare('
            SELECT * FROM produits
                WHERE id = ?
                LIMIT 1
        ');
        $select->execute([$id]);
        return $select->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * find with categorie id
     */
    public function findByCategorie(int $categorie){
        
        $select = $this->co->prepare('
            SELECT * FROM produits
                WHERE categorie = ?
        ');
        $select->execute([$categorie]);
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * insert a produit
     */
    public function insert(string $nom, string $description, float $prix, ?int $categorie)
    {
        $insert = $this->co->prepare('
            INSERT INTO produits(nom, description, prix, categorie)
                VALUES(?,?,?,?)
        ');
        $insert->execute([$nom, $description, $prix, $categorie]);
    }

    /**
     * update a produit
     */
    public function put(int $id, string $nom, string $description, float $prix, int $qte, ?int $categorie)
    {
        $insert = $this->co->prepare('
            UPDATE produits SET
                nom = ?,
                description = ?,
                prix = ?,
                qte = ?,
                categorie = ?
            WHERE id = ?
        ');
        $insert->execute([$nom, $description, $prix, $qte, $categorie, $id]);
    }
    /**
     * delete a produit
     */
    public function drop(int $id)
    {
        $insert = $this->co->prepare('
            DELETE FROM produits WHERE id = ?
        ');
        $insert->execute([$id]);
    }
}
