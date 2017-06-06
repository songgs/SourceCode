<?php
class Connection
{

    private static $conn;

    // return PDO connection
    public function connect()
    {
        //read db paramters from database.ini_alter
        $params = parse_ini_file('database.ini');
        if ($params === false) {
            throw new \Exception("error: reading database.ini");
        }

        //$connStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
        //$pdo = new \PDO($connStr);
        //$pdo->setAttribute(\PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $connStr = sprintf("host=%s port=%d dbname=%s user=%s password=%s",
        $params['host'],
        $params['port'],
        $params['database'],
        $params['user'],
        $params['password']);

        $pgc = pg_connect($connStr);
        if (!$pgc) :
            throw new Exception("error: connect database ".error_get_last($pgc));
        endif;
        return $pgc;
    }

    //return instance of connection obj
    public static function get()
    {
        if (null === static::$conn) :
            static::$conn=new static();
        endif;

        return static::$conn;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
