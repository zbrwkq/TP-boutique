<?php
class CategorieManager extends BDD
{
    /**
     * find all
     */
    public function findAll()
    {
        $select = $this->co->prepare('
            SELECT * FROM categories
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
            SELECT * FROM categories
                WHERE id = ?
        ');
        $select->execute([$id]);
        return $select->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * insert a categorie
     */
    public function insert(string $nom, string $description)
    {
        $insert = $this->co->prepare('
            INSERT INTO categories(nom, description)
                VALUES(?,?)
        ');
        $insert->execute([$nom, $description]);
    }

    /**
     * update a categorie
     */
    public function put(int $id, string $nom, string $description)
    {
        $insert = $this->co->prepare('
            UPDATE categories SET
                nom = ?,
                description = ?
            WHERE id = ?
        ');
        $insert->execute([$nom, $description, $id]);
    }
    /**
     * delete a categorie
     */
    public function drop(int $id)
    {
        $insert = $this->co->prepare('
            DELETE FROM categories WHERE id = ?
        ');
        $insert->execute([$id]);
    }
}
