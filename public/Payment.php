<?php
declare(strict_types=1);
require 'Debug.php';
require_once 'MySQLDatabase.php';

class Payment
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
        $stmt = $pdo->query('SELECT * FROM payments');
        $records = $stmt->fetchAll();

        $output['payments'] = [];
        foreach ($records as $record) {
            $payment = [];
            $payment['customerNumber'] = $record['customerNumber'];
            $payment['checkNumber'] = $record['checkNumber'];
            $payment['paymentDate'] = $record['paymentDate'];
            $payment['amount'] = $record['amount'];


            $output['payments'][] = $payment;
        }

        return $output;
    }

    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM payments WHERE customerNumber = {$id}");
        $records = $stmt->fetch();
        $output['paymentsInfo']= $records;

        return $output;
    }

}
?>