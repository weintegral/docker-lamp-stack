<?php
declare(strict_types = 1);

require 'Debug.php';
//require 'MySQLDatabase.php';
class Office
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
        $stmt = $pdo->query('SELECT * FROM offices');
        $records = $stmt->fetchAll();

        $output['offices'] = [];
        foreach ($records as $record) {
            $office = [];
            $office['officeCode'] = $record['officeCode'];
            $office['city'] = $record['city'];
            $office['phone'] = $record['phone'];
            $office['addressLine1']=$record['addressLine1'];
            $office['addressLine2']=$record['addressLine1'];
            $office['state']=$record['state'];
            $office['country']=$record['country'];
            $office['postalCode']=$record['postalCode'];
            $office['territory']=$record['territory'];

            $output['offices'][] = $office;
        }

        return $output;
    }

    public function findById(int $id) : array
    {
        $pdo = $this->database->getConnection();
        $stmt=$pdo->query("SELECT * FROM offices WHERE officeCode = {$id}");
        $record = $stmt->fetch();
        $output['officeDdata']=$record;

        return $output;

    }

}
