<?php
declare(strict_types=1);
require 'Debug.php';
class OrderDetail
{
    use Debug;
    private MySQLDatabase $database;

    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM orderdetails');
        $records = $stmt->fetchAll();

        $output['orderdetail'] = [];
        foreach ($records as $record) {
            $orderDetails = [];
            $orderDetails['orderNumber'] = $record['orderNumber'];
            $orderDetails['productCode'] = $record['productCode'];
            $orderDetails['quantityOrdered'] = $record['quantityOrdered'];
            $orderDetails['priceEach'] = $record['priceEach'];
            $orderDetails['orderLineNumber'] = $record['orderLineNumber'];

            $output['orderdetail'][] = $orderDetails;
        }

        return $output;
    }

    public function findById(int $id) : array
    {
        $pdo= $this->database->getConnection();
        //print_r('Printed');
        $stmt = $pdo->query("SELECT * FROM orderdetails WHERE orderNumber = {$id}");
        $records = $stmt->fetch();
        $output ['orderDetails']=$records;
        return $output;

    }
}
