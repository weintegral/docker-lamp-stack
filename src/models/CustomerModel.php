<?php
declare(strict_types=1);

namespace App\models;

use App\utils\MySQLDatabase;
use App\utils\ObjectContainer;
use LogicException;
use PDOException;

class CustomerModel
{
    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    /**
     * @throws PDOException
     */
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->query('SELECT * FROM customers');
        $records = $stmt->fetchAll();

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

    /**
     * @throws LogicException | PDOException
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
        $sql = "UPDATE `customers` SET";
        if (!empty($userData['name'])) {
            $sql .= "`customerName` = '{$userData['name']}',";
        }
        if (!empty($userData['lastName'])) {
            $sql .= "`contactLastName` = '{$userData['lastName']}',";
        }
        if (!empty($userData['firstName'])) {
            $sql .= "`contactFirstName` = '{$userData['firstName']}',";
        }
        if (!empty($userData['phone'])) {
            $sql .= "`phone` = '{$userData['phone']}',";
        }
        if (!empty($userData['addressLine1'])) {
            $sql .= "`addressLine1` = '{$userData['addressLine1']}',";
        }
        if (!empty($userData['addressLine2'])) {
            $sql .= "`addressLine2` = '{$userData['addressLine2']}',";
        }
        if (!empty($userData['city'])) {
            $sql .= "`city` = '{$userData['city']}',";
        }
        if (!empty($userData['state'])) {
            $sql .= "`state` = '{$userData['state']}',";
        }
        if (!empty($userData['postalCode'])) {
            $sql .= "`postalCode` = '{$userData['postalCode']}',";
        }
        if (!empty($userData['country'])) {
            $sql .= "`country` = '{$userData['country']}',";
        }
        if (!empty($userData['salesEmployeeNumber'])) {
            $sql .= "`salesRepEmployeeNumber` = '{$userData['salesEmployeeNumber']}',";
        }
        if (!empty($userData['creditLimit'])) {
            $sql .= "`creditLimit` = '{$userData['creditLimit']}',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= "WHERE `customerNumber` = {$id}";
        $sql .= ';';

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