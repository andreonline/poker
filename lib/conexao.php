<?php

/**
 * @package /lib/conexao.php
 * 
 * @since on 20/10/2014
 * 
 * @author Igor Cesar <mixplick87@gmail.com>
 * @version 1.0.1 (11/12/2014 | 12:26)
 * 
 */

namespace lib;

use Exception;

ini_set('max_execution_time', 600);

class conexao {

   #atributos / objetos para conexão
    var $host = "50.63.158.62";
    var $user = "pdm_root"; # Usuário no Host/Servidor
    var $pass = "M8Po#nQ&-5;0"; # Senha no Host/Servidor
    var $dbase = "pdm_poker"; # Nome do seu Banco de Dados    
   
    #atributos / objetos para crud
    var $query;
    var $link;
    var $resultado;
    var $row;
    var $return;
    var $tabela;
    var $valores;
    var $campos;

    function MySQL() {
        // Instancia o Objeto
    }

    function conecta() {

        $this->link = @mysql_connect($this->host, $this->user, $this->pass);

        // Conecta ao Banco de Dados


        if (!$this->link) {

            print "Ocorreu um Erro na conex&atilde;o MySQL:";
            print "<b>" . utf8_encode(mysql_error()) . "</b>";
            die();
        } elseif (!mysql_select_db($this->dbase, $this->link)) {

            // Seleciona o banco após a conexão
            print "Ocorreu um Erro em selecionar o Banco:";
            print "<b>" . utf8_encode(mysql_error()) . "</b>";
            die();
        }
    }

    // Cria a função para query no Banco de Dados
    function sql_query($query) {
        $this->conecta();
        $this->query = $query;

        // Conecta e faz a query no MySQL
        try {
            if ($this->resultado = mysql_query($this->query)) {
                $this->desconnecta();
                return $this->resultado;
            }
        } catch (Exception $exc) {

            print "Ocorreu um erro ao executar a Query MySQL: <b>$query</b>";
            print "<br /><br />";
            print "Erro no MySQL: <b>" . $exc->getTraceAsString() . "</b>";
            die();
            $this->desconnecta();
        }
    }

    function sql_fetch_array() {
        $this->conecta();
        try {
            if ($this->row = mysql_fetch_array($this->resultado)) {
                $this->desconnecta();
                return $this->row;
            }
        } catch (Exception $exc) {

            print "Ocorreu um erro ao executar a sql fetch array: <b>$this->resultado</b>";
            print "<br/><br/>";
            print "Erro no MySQL: <b>" . $exc->getTraceAsString() . "</b>";
            die();
            $this->desconnecta();
        }
    }

    function sql_fetch_object() {
        $this->conecta();
        try {
            if ($this->row = mysql_fetch_object($this->resultado)) {
                $this->desconnecta();
                return $this->row;
            }
        } catch (Exception $exc) {

            print "Ocorreu um erro ao executar sql fetch object: <b>$this->resultado</b>";
            print "<br/><br/>";
            print "Erro no MySQL: <b>" . $exc->getTraceAsString() . "</b>";
            die();
            $this->desconnecta();
        }
    }

    /**
     * 
     * @return Array mysql_fetch_assoc 
     */
    function sql_fetch_assoc() {
        $this->conecta();
        try {
            if ($this->row = mysql_fetch_assoc($this->resultado)) {
                $this->desconnecta();
                return $this->row;
            }
        } catch (Exception $exc) {
            print "Ocorreu um erro ao executar sql fetch assoc: <b>$this->resultado</b>";
            print "<br/><br/>";
            print "Erro no MySQL: <b>" . $exc->getTraceAsString() . "</b>";
            die();
            $this->desconnecta();
        }
    }

    /**
     * 
     * @return Array Array contendo linhas da tabela selecionada no BD
     */
    function sql_fetch_all() {
        $this->conecta();
        try {
            while ($this->row = mysql_fetch_array($this->resultado)) {
                $this->return[] = $this->row;
            }
            return $this->return;
        } catch (Exception $exc) {
            print "Ocorreu um erro ao executar sql fetch object: <b>$this->resultado</b>";
            print "<br/><br/>";
            print "Erro no MySQL: <b>" . $exc->getTraceAsString() . "</b>";
            die();
            $this->desconnecta();
        }
    }

    function insert() {
        $query = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->valores)";
        return $this->sql_query($query);
    }

    // Cria a função para Desconectar ao Banco MySQL
    function desconnecta() {
        return mysql_close($this->link);
    }

}
