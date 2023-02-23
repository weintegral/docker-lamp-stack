<?php
declare(strict_types = 1);

class CustomerModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM customers');
        $records = $stmt->fetchAll();
        $output['customers'] = [];
        foreach($records as $record) {
            $customer = [];
            $customer['name'] = $record['customerName'];
            $customer['number']= $record['customerNumber'];
            $customer['firstName']= $record['contactFirstName'];
            $customer['lastName']= $record['contactLastName'];

            $output['customers'][] = $customer;
        }

        return $output;
    }

    /**
     * @throws LogicException
     */
    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM customers WHERE customerNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['data'] = $record;

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
              `customers` (
                `customerNumber`,
                `customerName`,
                `contactLastName`,
                `contactFirstName`,
                `phone`,
                `addressLine1`,
                `addressLine2`,
                `city`,
                `state`,
                `postalCode`,
                `country`,
                `salesRepEmployeeNumber`,
                `creditLimit`
              )
            VALUES
              (
               {$userData['number']},
                '{$userData['name']}',
                '{$userData['lastName']}',
                '{$userData['firstName']}',
                '{$userData['phone']}',
                '{$userData['addressLine1']}',
                '{$userData['addressLine2']}',
                '{$userData['city']}',
                '{$userData['state']}',
                {$userData['postalCode']},
                '{$userData['country']}',
                {$userData['salesEmployeeNumber']},
                {$userData['creditLimit']}
              );
INSERT_SQL;
        $pdo->exec($sql);
    }

    /**
     * @throws PDOException
     */
    public function update(int $id, array $userData): void
    {
        $pdo = $this->database->getConnection();
        $sql = <<< UPDATE_SQL
            UPDATE `customers` 
            SET
                `customerName` = '{$userData['name']}',
                `contactLastName` = '{$userData['lastName']}',
                `contactFirstName` = '{$userData['firstName']}',
                `phone` = '{$userData['phone']}',
                `addressLine1`= '{$userData['addressLine1']}',
                `addressLine2` = '{$userData['addressLine2']}',
                `city` = '{$userData['city']}',
                `state` = '{$userData['state']}',
                `postalCode` = {$userData['postalCode']},
                `country` = '{$userData['country']}',
                `salesRepEmployeeNumber` = {$userData['salesEmployeeNumber']},
                `creditLimit` = {$userData['creditLimit']}
            WHERE `customerNumber` = {$id};
              ;
UPDATE_SQL;
        $pdo->exec($sql);
    }

    /**
     * @throws PDOException
     */
    public function delete(int $id): void
    {
        $pdo = $this->database->getConnection();
        $pdo->exec("DELETE FROM customers WHERE customerNumber = {$id}");
    }
}