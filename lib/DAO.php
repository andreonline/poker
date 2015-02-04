<?php

/**
 * @package /lib/DAO.php
 * 
 * @since on 31/01/2015
 * 
 * @author Igor Cesar <mixplick87@gmail.com>
 * @version 1.0.0 (31/01/2015 | 22:30)
 * 
 */

//namespace lib;

class DAO extends PDO {
# atributos / objetos usar no crud

    public $id;
    public $tabela;
    public $campos;
    public $valores;
    public $where;
    public $limit;
    public $asc;
    public $desc;
    public $data;

# atributos / objetos para junção de tabelas
    public $tabela1;
    public $tabela2;
    public $campo;
    public $like;

# atributos / objetos para conexão
    private $connect;
    private $root;
    private $pass;
    private static $conn;

    function DAO($connect, $root = '', $pass = '') {
        parent::__construct($connect, $root, $pass);        
    }

    public static function getDAO() {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new DAO("mysql:host=50.63.158.62;dbname=pdm_poker", "root", "M8Po#nQ&-5;0");
            } catch (PDOException $e) {
                throw new Exception("Erro ao conectar: " . $e->getMessage() . " Código: " . $e->getCode());
            }
        }

        return self::$conn;
    }

    public static function PDO($sql) {
        try {
            self::$conn = DAO::getDAO();
            $stm = self::$conn->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($result)) {
                return $result;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo "Erro de exceção: " . $e->getMessage() . " Código: " . $e->getCode();
        }
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function select() {
        $date = (!empty($this->data) ? ", DATE_FORMAT({$this->data}, '%d/%m/%Y') AS data" : "");
        $padrao = (!empty($this->desc) ? "{$this->desc} DESC" : "{$this->asc} ASC");
        $where = (!empty($this->where) ? "WHERE {$this->where}" : "" );
        $limit = (!empty($this->limit) ? "LIMIT {$this->limit}" : "" );
        $like = (!empty($this->like) ? "LIKE '%{$this->like}%'" : "" );

        if ((!empty($this->tabela1)) and ( !empty($this->tabela2) and ( !empty($this->campo)))) {
            $sql = "SELECT {$this->campos} {$date} FROM {$this->tabela1} INNER JOIN {$this->tabela2} ON {$this->campo} {$where} {$limit}";
        } else {
            $sql = "SELECT {$this->campos} {$date} FROM {$this->tabela} {$like} {$where} ORDER BY {$padrao} {$limit}";
        }

        return self::PDO($sql);
    }

    public function insert() {
        $sql = "INSERT INTO {$this->tabela} ({$this->campos}) VALUES ({$this->valores})";
        return self::PDO($sql);
    }

    public function update() {
        $sql = "UPDATE {$this->tabela} SET {$this->campos} WHERE id = {$this->getId()}";
        return self::PDO($sql);
    }

    public function delete() {
        $sql = "DELETE FROM {$this->tabela} WHERE id = {$this->getId()}";
        return self::PDO($sql);
    }

    public function total() {
        $sql = "SELECT COUNT(*) AS total FROM {$this->tabela}";
        return self::PDO($sql);
    }

}
