<?php

class OrderDetailModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM orderdetails');
        $records = $stmt->fetchAll();

        $output['orderDetails'] = [];
        foreach ($records as $record) {
            $orderDetails = [];
            $orderDetails['orderNumber'] = $record['orderNumber'];
            $orderDetails['productCode'] = $record['productCode'];
            $orderDetails['quantityOrdered'] = $record['quantityOrdered'];
            $orderDetails['priceEach'] = $record['priceEach'];
            $orderDetails['orderLineNumber'] = $record['orderLineNumber'];

            $output['orderDetails'][] = $orderDetails;
        }

        return $output;
    }

    public function findById(int $id) : array
    {
        $pdo= $this->database->getConnection();
        //print_r('Printed');
        $stmt = $pdo->query("SELECT * FROM orderdetails WHERE orderNumber = {$id}");
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
              `orderdetails` (
                `orderNumber`,
                `productCode`,
                `quantityOrdered`,
                `priceEach`,
                `orderLineNumber`
                
              )
            VALUES
              (
               {$userData['orderNumber']},
                '{$userData['productCode']}',
                '{$userData['quantityOrdered']}',
               {$userData['priceEach']},
                '{$userData['orderLineNumber']}'
                
              );
INSERT_SQL;
        $pdo->exec($sql);
//>>>>>>> a748f8a82a895f879d1aa5f18f9591087dd612b9
    }

}