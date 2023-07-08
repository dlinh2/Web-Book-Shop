<?php
require_once("classDatabase.php");

class Invoice extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function addInvoice($cart, $account_id=NULL, $custName, $custPhone, $custAddress, $invoiceStatus) {
        $sqlQuery = "insert into invoice values(NULL,?,?,?,?,?,?)";
        $datetime = date('Y-m-d H:i:s');
        $param = [$datetime, $account_id, $custName, $custPhone, $custAddress, $invoiceStatus];
        $result = $this->executeSQL($sqlQuery, $param);
        foreach ($cart as $row) {
            $sqlQuery = "insert into book_order values((select MAX(invoice_id) from invoice),?, ?, ?)";
            $param = [$row->title, $row->quantity, $row->unitPrice];
            $result = $this->executeSQL($sqlQuery, $param);
        }
        return $result;
    }

    function getInvoiceList() {
        $sqlQuery = "select * from invoice";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getInvoiceDetails($invoiceId) {
        $sqlQuery = "select * from invoice where invoice_id = ?";
        $result1 = $this->executeSQL($sqlQuery, [$invoiceId]);
        if ($result1) {
            $this->data = $this->pdo_statement->fetch();
        }
        $sqlQuery = "select * from book_order where invoice_id = ?";
        $result2 = $this->executeSQL($sqlQuery, [$invoiceId]);
        if ($result2) {
            $this->data["rows"] = $this->pdo_statement->fetchAll();
        }
        return $result1 && $result2;
    }

    function deleteInvoice($invoiceId) {
        $sqlQuery = "delete from book_order where invoice_id = ?";
        $result1 = $this->executeSQL($sqlQuery, [$invoiceId]);
        $sqlQuery = "delete from invoice where invoice_id = ?";
        $result2 = $this->executeSQL($sqlQuery, [$invoiceId]);
        return $result1 && $result2;
    }
}