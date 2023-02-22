<?php
declare(strict_types=1);
require 'Debug.php';
require_once 'MySQLDatabase.php';

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

    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM payments WHERE customerNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['OrderDetails data'] = $record;

        return $output;
    }

    /**
     * @throws PDOException
     */
    public function insert(array $userData): void
    {
        $pdo = $this->database->getConnection();
        $sql = <<< INSERT_SQL
            INSERT INTO
              `payments` (
                `customerNumber`,
                `checkNumber`,
                `paymentDate`,
                `amount`
                
              )
            VALUES
              (
               {$userData['customerNumber']},
                '{$userData['checkNumber']}',
                '{$userData['paymentDate']}'
                
              );
INSERT_SQL;
        $pdo->exec($sql);
//>>>>>>> a748f8a82a895f879d1aa5f18f9591087dd612b9
    }

}