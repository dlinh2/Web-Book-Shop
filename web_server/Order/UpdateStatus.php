<?php 
require_once("../../models/classInvoice.php");

if (isset($_POST["id"]) && isset($_POST["status"])) {
    $invoiceObj = new Invoice();
    $invoiceObj->updateInvoiceStatus($_POST["id"], $_POST["status"]);
    unset($invoiceObj);
}