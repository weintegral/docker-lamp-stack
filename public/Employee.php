<?php
declare(strict_types=1);
require 'Debug.php';
class Employee
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
        $stmt = $pdo->query('SELECT * FROM employees');
        $records = $stmt->fetchAll();

        $output['employees'] = [];
        foreach($records as $record) {
            $employee = [];
            $employee['number']= $record['employeeNumber'];
            $employee['firstName']= $record['firstName'];
            $employee['lastName']= $record['lastName'];

            $output['employees'][] = $employee;
        }

        return $output;
    }

    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM employees WHERE employeeNumber = {$id}");
        $record = $stmt->fetch();
        $output['Employee data'] = $record;

        return $output;
    }
}