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
        $output['orderdetails'] = [];
        foreach($records as $record) {
            $orderdetail = [];
            $orderdetail['orderNumber'] = $record['orderNumber'];
            $orderdetail['productCode'] = $record['productCode'];
            $orderdetail['quantityOrdered'] = $record['quantityOrdered'];
            $orderdetail['priceEach'] = $record['priceEach'];
            $orderdetail['orderLineNumber'] = $record['orderLineNumber'];
            $output['orderdetails'][] = $orderdetail;
        }

        return $output;
    }

    /**
     * @throws LogicException
     */
    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM orderdetails WHERE orderNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['OrderDetail data'] = $record;

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
                '{$userData['priceEach']}',
                '{$userData['orderLineNumber']}'
              );
INSERT_SQL;
        $pdo->exec($sql);
    }
}