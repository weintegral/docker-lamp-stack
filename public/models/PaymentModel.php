<?php

class PaymentModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM payments');
        $records = $stmt->fetchAll();
        $output['payments'] = [];
        foreach($records as $record) {
            $payment = [];
            $payment['customerNumber'] = $record['customerNumber'];
            $payment['checkNumber'] = $record['checkNumber'];
            $payment['paymentDate'] = $record['paymentDate'];
            $payment['amount'] = $record['amount'];
            $output['payments'][] = $payment;
        }

        return $output;
    }

    /**
     * @throws LogicException
     */
    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM payments WHERE customerNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['Payment data'] = $record;

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
                '{$userData['paymentDate']}',
                '{$userData['amount']}'
              );
INSERT_SQL;
        $pdo->exec($sql);
    }
}