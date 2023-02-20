<?php
declare(strict_types = 1);
class OrderDetail
{
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

        $output['orderdetails'] = [];
        foreach ($records as $record) {
            $orderdetail = [];
            $orderdetail['orderNumber'] = $record['orderNumber'];
            $orderdetail['productCode'] = $record['productCode'];
            $orderdetail['quantityOrdered'] = $record['quantityOrdered'];
            $orderdetail['priceEach'] = $record['priceEach'];
            $orderdetail['orderLineNumber'] = $record['orderLineNumber'];
            $output['orderdetails'][] = $orderdetail;
        }
        return $output;
    }
}