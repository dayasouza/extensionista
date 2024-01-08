<?php

class Database{

    private $host = 'localhost';
    private $user = 'root' ;
    private $password = '';
    private $db = 'precificacao';
    private $porta = '3306' ;

    private $dbh ;  
    private $stmt ; 
    
    

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this -> host . ';port=' . $this -> porta . ';dbname=' . $this -> db;
        $opcoes = [
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this -> dbh = new PDO($dsn, $this-> user, $this-> password, $opcoes);
        } catch (PDOException $e) {
            print "Error!: " . $e -> getMessage() . "<br/>";
            die();
        }
    }

    public function query($sql){
        // Prepara a consulta SQL usando a conexão do banco de dados
        $this -> stmt = $this -> dbh -> prepare($sql);
    }

    public function bind($paremtro, $valor, $tipo = null)
    {
        // Verifica se o tipo do parâmetro não foi fornecido
        if (is_null($tipo)) {
            // Detecta automaticamente o tipo do parâmetro com base no valor fornecido
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        // Associa o valor ao parâmetro na consulta SQL preparada
        $this -> stmt -> bindValue($paremtro, $valor, $tipo);
    }

    public function executa()
    {
        // Executa a consulta SQL preparada e retorna o resultado da execução
        return $this -> stmt -> execute();
    }

    public function resultado()
    {
        // Executa a consulta SQL preparada
        $this -> executa();
        // Retorna a primeira linha do resultado como um objeto
        return $this -> stmt -> fetch (PDO::FETCH_OBJ);
    }

    public function resultados()
    {
        // Executa a consulta SQL preparada
        $this -> executa();
        // Retorna todas as linhas do resultado como um array de objetos
        return $this -> stmt -> fetchAll (PDO::FETCH_OBJ);
    }

    public function totalResultados()
    {   
        // Utiliza o método rowCount() do objeto $stmt para obter o número total de linhas afetadas
        return $this-> stmt -> rowCount();
    }

    public function ultimoIdInserido()
    {
        // Utiliza o método lastInsertId() do objeto $dbh para obter o último ID inserido
        return $this-> dbh -> lastInsertId();
    }




}
