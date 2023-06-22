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

    function getBook($book_id) {
        $sqlQuery = "select * from book where book_id=?";
        $result = $this->executeSQL($sqlQuery, $book_id);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addBook($name, $vnname="", $category_id, $author_id, $translator_id="", $publisher_id, 
                     $status, $pages, $sizes, $date, $description, $price, $cover) {
        $sqlQuery = "insert into book values(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $param = [$name, $vnname, $category_id, $author_id, $translator_id, $publisher_id, 
                  $status, $pages, $sizes, $date, $description, $price, $cover];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function updateBook($book_id, $name, $vnname="", $category_id, $author_id, $translator_id="", $publisher_id, 
                        $status, $pages, $sizes, $date, $description, $price, $cover) {
        $sqlQuery = "update book
                    set book_name=?,
                        book_vnname=?,
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
        $param = [$name, $vnname, $category_id, $author_id, $translator_id, $publisher_id, 
                  $status, $pages, $sizes, $date, $description, $price, $cover, $book_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deleteBook($book_id) {
        $sqlQuery = "delete from book where book_id=?";
        $result = $this->executeSQL($sqlQuery, $book_id);
        return $result;
    }
}