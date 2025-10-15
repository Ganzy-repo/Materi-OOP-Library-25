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

    public function getById($id)
    {
        try {
            $query = $this->connect();
            $data = $query->query("SELECT * FROM book WHERE id = $id");
            return $data->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function update($id, $category_id, $title, $author, $year, $qty)
    {
        try {
            $query = $this->connect();
            $data = "UPDATE book SET 
                     category_id = '$category_id', 
                     title = '$title', 
                     author = '$author', 
                     year = '$year', 
                     qty = '$qty' 
                     WHERE id = $id";

            $query->exec($data);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $query = $this->connect();
            $data = "DELETE FROM book WHERE id = $id";
            $query->exec($data);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
