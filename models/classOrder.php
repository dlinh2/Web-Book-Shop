<?php
require_once("classDatabase.php");
class Order extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getOrderList()
    {
        $sqlQuery = "select * from invoice";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function searchBook($search){
        $sqlQuery = "select * from book where book_name like '%".$search."%'";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function searchInvoice($search){
        $sqlQuery = "select * from invoice where invoice_id like '%".$search."%'";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

}

class Detail extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getDetailList()
    {
        $sqlQuery = "select * from book_order";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getDetailListByInvoiceId($invoiceId)
    {
        $sqlQuery = "select * from book_order where invoice_id = :invoiceId";
        $params = array(':invoiceId' => $invoiceId);
        $result = $this->executeSQL($sqlQuery, $params);
        
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }


}

class Invoice extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getInvoiceId() {
        $sqlQuery = "select invoice_id from book_order";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            // $this->data = $this->pdo_statement->fetch();
            $this->data = $this->pdo_statement->fetchAll(PDO::FETCH_COLUMN);
        }
        return $result;
    }


}