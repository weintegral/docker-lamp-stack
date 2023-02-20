<?php
declare(strict_types = 1);
class Product
{
    private MySQLDatabase $database;
    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM products');
        $records = $stmt->fetchAll();

        $output['products'] = [];
        foreach ($records as $record) {
            $product = [];
            $product['productCode'] = $record['productCode'];
            $product['productName'] = $record['productName'];
            $product['productLine'] = $record['productLine'];
            $product['productScale'] = $record['productScale'];
            $product['productVendor'] = $record['productVendor'];
            $product['productDescription'] = $record['productDescription'];
            $product['quantityInStock'] = $record['quantityInStock'];
            $product['buyPrice'] = $record['buyPrice'];
            $product['MSRP'] = $record['MSRP'];
            $output['products'][] = $product;
        }
        return $output;
    }
}