<?php
require_once("classDatabase.php");
class Author extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getAuthorList() {
        $sqlQuery = "select * from author";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getAuthor($author_id) {
        $sqlQuery = "select * from author where author_id=?";
        $result = $this->executeSQL($sqlQuery, $author_id);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addAuthor($author_name) {
        $sqlQuery = "insert into author values(NULL,?)";
        $result = $this->executeSQL($sqlQuery, $author_name);
        return $result;
    }

    function updateAuthor($author_id, $author_name) {
        $sqlQuery = "update author
                    set author_name=?
                    where author_id=?";
        $param = [$author_name, $author_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deleteAuthor($author_id) {
        $sqlQuery = "delete from author where author_id=?";
        $result = $this->executeSQL($sqlQuery, $author_id);
        return $result;
    }
}