<?php
require_once("classDatabase.php");

class Invoice extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function addInvoice($cart, $username=NULL, $custName, $custPhone, $custEmail, $custAddress, $invoiceStatus) {
        $sqlQuery = "insert into invoice values(NULL,?,?,?,?,?,?,?)";
        $datetime = date('Y-m-d H:i:s');
        $param = [$datetime, $username, $custName, $custPhone, $custEmail, $custAddress, $invoiceStatus];
        $result = $this->executeSQL($sqlQuery, $param);
        foreach ($cart as $row) {
            $sqlQuery = "insert into book_order values((select MAX(invoice_id) from invoice),?, ?, ?)";
            $param = [$row->title, $row->quantity, $row->unitPrice];
            $result = $this->executeSQL($sqlQuery, $param);
        }
        $this->executeSQL("select MAX(invoice_id) as id from invoice");
        return $this->pdo_statement->fetch();
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

    function getInvoicesByAccount($username) {
        $sqlQuery = "select * from invoice where username=?";
        $result = $this->executeSQL($sqlQuery, [$username]);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function deleteInvoice($invoiceId) {
        $sqlQuery = "delete from book_order where invoice_id = ?";
        $result1 = $this->executeSQL($sqlQuery, [$invoiceId]);
        $sqlQuery = "delete from invoice where invoice_id = ?";
        $result2 = $this->executeSQL($sqlQuery, [$invoiceId]);
        return $result1 && $result2;
    }

    function updateInvoiceStatus($invoiceId, $status) {
        $sqlQuery = "update invoice set invoice_status=? where invoice_id=?";
        $param = [$status, $invoiceId];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }
}