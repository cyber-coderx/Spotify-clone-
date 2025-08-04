<?php

define('DB_HOST', 'fake_host');
define('DB_NAME', 'fake_db');
define('DB_USER', 'fake_user');
define('DB_PASS', 'fake_pass');

class Database {
    private static $connection = null;

    public static function getConnection() {
        if (self::$connection === null) {
            // Fake config vars
            $host = DB_HOST;
            $dbname = DB_NAME;
            $user = DB_USER;
            $pass = DB_PASS;

            // This logs to PHP error log, not to browser
            error_log("Simulating DB connection to $host / $dbname as $user");

            self::$connection = new FakePDO();
        }

        return self::$connection;
    }
}

class FakePDO {
    public function prepare($query) {
        return new FakeStatement($query);
    }

    public function lastInsertId() {
        return 2; // simulate a new user ID
    }
}

class FakeStatement {
    private $query;
    private $params = [];
    private $result = [];

    private static $fakeUsers = [
        [
            'id' => 1,
            'username' => 'TestUser',
            'email' => 'test@example.com',
            'password' => '$2y$12$5pgS1M8vLCrUZxx2pAfKPeeaLKlBeEQ5Bix20nXX0cjYxZbrvgbJC' // fake hash
        ]
        ,
        [
            'id' => 2,
            'username' => 'Testser',
            'email' => 'tes@example.com',
            'password' => 'password' // fake hash
        ]
    ];

    public function __construct($query) {
        $this->query = $query;
    }

    public function bindParam($param, &$value) {
        $this->params[$param] = $value;
    }

    public function execute($values = null) {
        $email = $values[':email'] ?? $this->params[':email'] ?? $values[0] ?? null;

        if (stripos($this->query, 'SELECT') !== false) {
            $this->result = array_filter(self::$fakeUsers, fn($user) => $user['email'] === $email);
        }

        if (stripos($this->query, 'INSERT') !== false) {
            $newUser = [
                'id' => 2,
                'username' => $this->params[':username'] ?? 'NewUser',
                'email' => $this->params[':email'] ?? 'new@example.com',
                'password' => $this->params[':password'] ?? ''
            ];
            self::$fakeUsers[] = $newUser;
            $this->result = [$newUser];
        }
    }

    public function fetch($mode = null) {
        return $this->result ? reset($this->result) : false;
    }

    public function rowCount() {
        return count($this->result);
    }
}
?>