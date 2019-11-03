<?php

class Historico {

    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=projeto_logeventos;host=localhost", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Erro:" . $ex->getMessage());
        }
    }
    public function registrar($acao){
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = $this->pdo->prepare("INSERT INTO historico SET ip = :ip, data_acao= NOW(), acao= :acao");
        $sql->bindValue(":ip", $ip);
        $sql->bindValue(":acao", $acao);
        $sql->execute();
    }

}
