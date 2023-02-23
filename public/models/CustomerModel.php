<?php
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
            $customer['phone'] = $record['phone'];
            $customer['addressLine1']= $record['addressLine1'];
            $customer['addressLine2']= $record['addressLine2'];
            $customer['city']= $record['city'];
            $customer['state']= $record['state'];
            $customer['postalCode']= $record['postalCode'];
            $customer['country'] = $record['country'];
            $customer['salesRepEmployeeNumber']= $record['salesRepEmployeeNumber'];
            $customer['creditLimit']= $record['creditLimit'];

            $output['customers'][] = $customer;
        }

        return $output;
    }

    public function findById(int $id): array
    {
        $pdo = $this->database->getConnection();
        $stmt = $pdo->query("SELECT * FROM customers WHERE customerNumber = {$id}");
        $record = $stmt->fetch();
        if (gettype($record) !== 'array') {
            throw new LogicException('data is not properly retrieved from DB');
        }
        $output['Customers data'] = $record;

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
}