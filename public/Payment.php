<?php
declare(strict_types = 1);
class Payment
{
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
}