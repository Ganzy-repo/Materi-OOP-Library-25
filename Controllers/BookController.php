<?php
require_once "Controller.php";
require_once "Models/Category.php";
require_once "Models/Book.php";

class BookController extends Controller
{
    static function index()
    {
        session_start();
        $dataLogin = $_SESSION["is_login"] ?? false;

        $bookModel = new Book();
        $books = $bookModel->getData();

        $categoryModel = new Category();
        $categories = $categoryModel->getData();

        $allData = [
            'books' => $books,
            'category' => $categories
        ];

        return self::view("Views/Book.php", $allData, $dataLogin);
    }

    static function create()
    {
        session_start();
        $data = new Category();
        return self::view("Views/Admin/CreateBook.php", $data->getData());
    }

    static function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /book");
            exit;
        }

        session_start();
        $bookModel = new Book();
        $book = $bookModel->getById($id);

        $categoryModel = new Category();
        $categories = $categoryModel->getData();

        $data = [
            'book' => $book,
            'category' => $categories
        ];

        return self::view("Views/Admin/UpdateBook.php", $data);
    }

    static function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $category_id = $_POST["category_id"] ?? null;
            $title = $_POST["title"] ?? null;
            $author = $_POST["author"] ?? null;
            $year = $_POST["year"] ?? null;
            $qty = $_POST["qty"] ?? null;

            if ($category_id && $title && $author && $year && $qty) {
                $book = new Book();
                $result = $book->update($id, $category_id, $title, $author, $year, $qty);

                if ($result) {
                    session_start();
                    $_SESSION["SUCCESS"] = "Buku berhasil diupdate!";
                    header("Location: /book");
                    exit;
                } else {
                    session_start();
                    $_SESSION["ERROR"] = "Gagal update data buku.";
                    header("Location: /edit-book?id=$id");
                    exit;
                }
            } else {
                session_start();
                $_SESSION["ERROR"] = "Semua field wajib diisi!";
                header("Location: /edit-book?id=$id");
                exit;
            }
        }
    }

    static function delete()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: /book");
            exit;
        }

        $book = new Book();
        $result = $book->delete($id);

        session_start();
        if ($result) {
            $_SESSION["SUCCESS"] = "Buku berhasil dihapus!";
        } else {
            $_SESSION["ERROR"] = "Gagal menghapus buku.";
        }

        header("Location: /book");
        exit;
    }

    static function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $category_id = $_POST["category_id"] ?? null;
            $title = $_POST["title"] ?? null;
            $author = $_POST["author"] ?? null;
            $year = $_POST["year"] ?? null;
            $qty = $_POST["qty"] ?? null;

            if ($category_id && $title && $author && $year && $qty) {
                $book = new Book();
                $result = $book->create($category_id, $title, $author, $year, $qty);

                if ($result) {
                    session_start();
                    $_SESSION["SUCCESS"] = "Buku berhasil ditambahkan!";
                    header("Location: /book");
                    exit;
                } else {
                    session_start();
                    $_SESSION["ERROR"] = "Gagal menyimpan data buku.";
                    header("Location: /create-book");
                    exit;
                }
            } else {
                session_start();
                $_SESSION["ERROR"] = "Semua field wajib diisi!";
                header("Location: /create-book");
                exit;
            }
        }
    }
}
