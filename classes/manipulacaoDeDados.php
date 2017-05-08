<?php
include_once("conexaoMySQL.php");
class manipulacaoDeDados extends conexaoMySQL {

    protected $sql;
    protected $tabela;
    protected $campos;
    protected $dados;
    protected $msg;
    protected $valorNaTabela;
    protected $valorPesquisa;

    public function getSql() {
        return $this->sql;
    }

    public function setTabela($tbl) {
        $this->tabela = $tbl;
    }

    public function setCampos($campo) {
        $this->campos = $campo;
    }

    public function setDados($dado) {
        $this->dados = $dado;
    }

    public function getMsg() {
        return $this->msg;
    }

    public function setValorNaTabela($val) {
        $this->valorNaTabela = $val;
    }

    public function setValorPesquisa($pesq) {
        $this->valorPesquisa = $pesq;
    }

    public function inserir() {
        $this->sql = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->dados)";
        if (self::executarSQL($this->sql)) {
            $this->msg = "Registro cadastrado com sucesso...";
        }
    }

    public function excluir() {
        $this->sql = "DELETE FROM $this->tabela WHERE $this->valorNaTabela = $this->valorPesquisa";

        if (self::executarSQL($this->sql)) {
            $this->msg = "Registro excluido com sucesso...";
        }
    }

    public function alterar() {
        $sql = "UPDATE tabela set campos WHERE valorNaTabela = valorpesquisa ";
        $this->sql = "UPDATE $this->tabela SET $this->campos WHERE $this->valorNaTabela = $this->valorPesquisa";
        if (self::executarSQL($this->sql)) {
            $this->msg = "Registro Alterado com sucesso...";
        }
    }

    public function ultimoRegistro($campo, $tabela) {
        $sql = "SELECT $campo FROM $tabela ORDER BY $campo DESC LIMIT 1";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        return $linha["$campo"];
    }
	public function SomaDoCampo($campo, $tabela,$cod) {
        $sql = "SELECT SUM($campo) AS T FROM $tabela WHERE $cod";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);

        return $linha["T"];
		
    }

}

?>