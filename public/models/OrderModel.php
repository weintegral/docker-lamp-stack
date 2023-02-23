<?php

class OrderModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM orders');
        $records = $stmt->fetchAll();
        $output['orders'] = [];
        foreach($records as $record) {
            $order = [];
            $order['orderNumber'] = $record['orderNumber'];
            $order['orderDate'] = $record['orderDate'];
            $order['requiredDate'] = $record['requiredDate'];
            $order['shippedDate'] = $record['shippedDate'];
            $order['status'] = $record['status'];
            $order['comments'] = $record['comments'];
            $order['customerNumber'] = $record['customerNumber'];
            $output['orders'][] = $order;
        }

        return $output;
    }

    /**
     * @throws LogicException
     */
    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM orders WHERE orderNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['Order data'] = $record;

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
              `orders` (
                `orderNumber`,
                `orderDate`,
                `requiredDate`,
                `shippedDate`,
                `status`,
                `comments`,
                `customerNumber`
              )
            VALUES
              (
               {$userData['orderNumber']},
                '{$userData['orderDate']}',
                '{$userData['requiredDate']}',
                '{$userData['shippedDate']}',
                '{$userData['status']}',
                '{$userData['comments']}',
                '{$userData['customerNumber']}'
              );
INSERT_SQL;
        $pdo->exec($sql);
    }
}