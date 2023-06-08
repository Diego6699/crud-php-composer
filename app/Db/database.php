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
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USERNAME,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}