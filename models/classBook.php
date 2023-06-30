<?php
require_once("classDatabase.php");
class Book extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getBookList() {
        $sqlQuery = "select * from book";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getBookById($book_id) {
        $sqlQuery = "select * from book where book_id=?";
        $result = $this->executeSQL($sqlQuery, [$book_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function getBooksByAuthor($author_id) {
        $sqlQuery = "select * from book where book_author_id=?";
        $result = $this->executeSQL($sqlQuery, [$author_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function getBooksByPublisher($publisher_id) {
        $sqlQuery = "select * from book where book_publisher_id=?";
        $result = $this->executeSQL($sqlQuery, [$publisher_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function getBooksByTranslator($translator_id) {
        $sqlQuery = "select * from book where book_translator_id=?";
        $result = $this->executeSQL($sqlQuery, [$translator_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function getBooksByCategory($category_id) {
        $sqlQuery = "select * from book where book_category_id=?";
        $result = $this->executeSQL($sqlQuery, [$category_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addBook($name, $category_id="", $author_id, $translator_id="", $publisher_id, 
                     $status, $pages, $sizes, $date, $description, $price, $cover) {
        $sqlQuery = "insert into book values(NULL,?,?,?,?,?,?,?,?,?,?,?,?)";
        if ($category_id=="") $category_id = NULL;
        if ($translator_id=="") $translator_id = NULL;
        $param = [$name, $category_id, $author_id, $translator_id, $publisher_id, 
                  $status, $pages, $sizes, $date, $description, $price, $cover];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function updateBook($book_id, $name, $category_id="", $author_id, $translator_id="", $publisher_id, 
                        $status, $pages, $sizes, $date, $description, $price, $cover) {
        if ($category_id=="") $category_id = NULL;
        if ($translator_id=="") $translator_id = NULL;
        $sqlQuery = "update book
                    set book_name=?,
                        book_category_id=?,
                        book_author_id=?,
                        book_translator_id=?,
                        book_publisher_id=?,
                        book_status=?,
                        book_pages=?,
                        book_sizes=?,
                        book_publish_date=?,
                        book_description=?,
                        book_price=?,
                        book_cover=?
                    where book_id=?";
        $param = [$name, $category_id, $author_id, $translator_id, $publisher_id, 
                  $status, $pages, $sizes, $date, $description, $price, $cover, $book_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deleteBook($book_id) {
        $sqlQuery = "delete from book where book_id=?";
        $result = $this->executeSQL($sqlQuery, [$book_id]);
        return $result;
    }
}