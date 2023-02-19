<?php
declare(strict_types=1);
require 'Debug.php';
class ProductLine
{
    private MySQLDatabase $database;

    use Debug;
    public function __construct(MySQLDatabase $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM productlines');
        $records = $stmt->fetchAll();

        $output['productlines'] = [];
        foreach ($records as $record) {
            $productline = [];
            $productline['productLine'] = $record['productLine'];
            $productline['textDescription'] = $record['textDescription'];
            $productline['htmlDescription'] = $record['htmlDescription'];
            $productline['image'] = $record['image'];


            $output['productlines'][] = $productline;
        }

        return $output;
    }

    public function findById(string $id) : array

    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM productlines WHERE productLine = '{$id}'" );
        $record = $stmt->fetch();
        $output['productLines']=$record;

        return $output;
    }

}