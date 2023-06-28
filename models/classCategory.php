<?php
require_once("classDatabase.php");
class Category extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getCategoryList() {
        $sqlQuery = "select * from category";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getCategoryById($category_id) {
        $sqlQuery = "select * from category where category_id=?";
        $result = $this->executeSQL($sqlQuery, [$category_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addCategory($category_name, $category_order, $category_status) {
        $sqlQuery = "insert into category values(NULL,?,?,?)";
        $result = $this->executeSQL($sqlQuery, [$category_name, $category_order, $category_status]);
        return $result;
    }

    function updateCategory($category_id, $category_name, $category_order, $category_status) {
        $sqlQuery = "update category
                    set category_name=?,
                        category_order=?,
                        category_status=?
                    where category_id=?";
        $param = [$category_name, $category_order, $category_status, $category_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deleteCategory($category_id) {
        $sqlQuery = "delete from category where category_id=?";
        $result = $this->executeSQL($sqlQuery, [$category_id]);
        return $result;
    }
}