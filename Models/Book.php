<?php

require_once "Model.php";

class Book extends Model
{
    private $id, $category_id, $title, $author, $year, $qty;

    public function create($category_id, $title, $author, $year, $qty)
    {
        try {
            $query = $this->connect();

            $data = "INSERT INTO book (category_id, title, author, year, qty)
                     VALUES ('$category_id', '$title', '$author', '$year', '$qty')";
            
            $query->exec($data);

            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getData()
{
    try {
        $query = $this->connect();
        
        // JOIN DENGAN TABLE category (bukan categories)
        $data = $query->query("
            SELECT book.*, category.category_name 
            FROM book 
            JOIN category ON book.category_id = category.id
        ");
        
        return $data->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (\Throwable $th) {
        return [];
    }
}

    



}