<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database
{

    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const DBNAME = 'wdev_vagas';
    /**
     * Usuário do banco de dados
     */
    const USERNAME = 'root';

    /**
     * Senha de acesso do banco de dados
     * @var string
     */
    const PASSWORD = '1234';
    /** 
     * Nome da tebla a ser manipulado
     * @var string
     */
    private $table;

    /**
     * Instacia do PDO
     * @var PDO
     */
    private $connection;

    /** 
     * Define a tabla e instacia e conexão 
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }
    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME, self::USERNAME, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    /**
     * Método reponsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
    /**
     * Método responsável por inserir dados no banco
     * @param array $values [field => value ]
     * @return integer ID Inserido
     */
    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //MONTA A QUERY
        $query = "INSERT INTO " . $this->table . " (" . implode(',', $fields) . ") VALUES (" . implode(',', $binds) . ")";
        //Executa o  insert
        $this->execute($query, array_values($values));
        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }
    /**
     * Método responsável por executar uma consulta no banco
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null,$fields = '*'){
        $where = !empty($where) ? "WHERE ".$where : '';
        $order = !empty($order) ? "ORDER BY ".$order : '';
        $limit = !empty($where) ? "LIMIT ".$limit : '';
        //MONTA A QUERY
        $query = "SELECT ".$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }
}
