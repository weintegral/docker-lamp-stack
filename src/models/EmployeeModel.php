<?php
declare(strict_types=1);
namespace App\models;

use App\utils\MySQLDatabase;
use App\utils\ObjectContainer;
use LogicException;
use PDOException;

class EmployeeModel
{


    private MySQLDatabase $database;

    public function __construct()
    {
        $this->database = ObjectContainer::mysqlDB();
    }

    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query('SELECT * FROM employees');
        $records = $stmt->fetchAll();

        $output['employees'] = [];
        foreach ($records as $record) {
            $employee = [];
            $employee['number'] = $record['employeeNumber'];
            $employee['firstName'] = $record['firstName'];
            $employee['lastName'] = $record['lastName'];
            $employee['extension'] = $record['extension'];
            $employee['email'] = $record['email'];
            $employee['officeCode'] = $record['officeCode'];
            $employee['reportsTo'] = $record['reportsTo'];
            $employee['jobTitle'] = $record['jobTitle'];

            $output['employees'][] = $employee;
        }

        return $output;
    }

    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM employees WHERE employeeNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['Employees data'] = $record;
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
              `employees` (
                `employeeNumber`,
                `lastName`,
                `firstName`,
                `contactFirstName`,
                `extension`,
                `email`,
                `officeCode`,
                `reportsTo`,
                `jobTitle`
                
              )
            VALUES
              (
               {$userData['employeeNumber']},
                '{$userData['lastName']}',
                '{$userData['firstName']}',
               {$userData['contactFirstName']},
                '{$userData['extension']}',
                '{$userData['email']}',
                '{$userData['officeCode']}',
                '{$userData['reportsTo']}',
                '{$userData['jobTitle']}'
                
              );
INSERT_SQL;
        $pdo->exec($sql);
//>>>>>>> a748f8a82a895f879d1aa5f18f9591087dd612b9
    }

    /**
     * @throws PDOException
     */
    public function update(int $id, array $userData): void
    {
        $pdo = $this->database->getConnection();
        $sql = <<< UPDATE_SQL
            UPDATE `employees` 
            SET
                `lastName`=,'{$userData['lastName']}',
                `firstName`='{$userData['firstName']}',
                `contactFirstName`='{$userData['contactFirstName']}',
                `extension`='{$userData['extension']}',
                `email`='{$userData['email']}',
                `officeCode`= '{$userData['officeCode']}',
                `reportsTo`='{$userData['reportsTo']}',
                `jobTitle`` =  '{$userData['jobTitle']}'
            WHERE `employeeNumber` = {$id};
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
        $pdo->exec("DELETE FROM employees WHERE employeeNumber = {$id}");
    }
}