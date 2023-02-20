<?php
declare(strict_types = 1);
class Order
{
    private MySQLDatabase $database;
    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM orders');
        $records = $stmt->fetchAll();

        $output['orders'] = [];
        foreach ($records as $record) {
            $order = [];
            $order['orderNumber'] = $record['orderNumber'];
            $order['orderDate'] = $record['orderDate'];
            $order['requiredDate'] = $record['requiredDate'];
            $order['shippedDate'] = $record['shippedDate'];
            $order['status'] = $record['status'];
            $order['comments'] = $record['comments'];
            $order['customerNumber'] = $record['customerNumber'];
            $output['orders'][] = $order;
        }
        return $output;
    }
}