<?php
declare(strict_types=1);
require 'Debug.php';
class Product
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
        $stmt = $pdo->query('SELECT * FROM products');
        $records = $stmt->fetchAll();
        //echo '<pre>';
        $output['products'] = [];
        foreach ($records as $record) {
            //var_dump($records);
            //echo '<br><br><br>';
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

    public function findById(string $id) :array
    {
        $pdo=$this->database->getConnection();
        $stmt=$pdo->query("SELECT * FROM products WHERE productCode = '{$id}'");
        $records = $stmt->fetch();
        $output['productInfo'] = $records;

        return $output;
    }

}