<?php
require 'Debug.php';
require_once 'MySQLDatabase.php';
class Customer
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
        $stmt = $pdo->query('SELECT * FROM customers');
        $records = $stmt->fetchAll();
        //$this->printing($records);
        $output['customers'] = [];
        foreach ($records as $record) {
            $customer = [];
            $customer['name'] = $record['customerName'];
            $customer['number'] = $record['customerNumber'];
            $customer['firstName'] = $record['contactFirstName'];
            $customer['lastName'] = $record['contactLastName'];

            $output['customers'][] = $customer;
        }

        return $output;
    }

    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM customers WHERE customerNumber={$id}");
        $record = $stmt->fetch();
        $output['data']= $record;

        return $output;

    }
}