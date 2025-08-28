<?php
/*
    Autor: Caio Henrique Mota Cuadra
    Data: 26/08/2025
*/


class Contagem
{
    private $id;
    private $insumo;
    private $quantidade;
    private $dia;
    private $mes;
    private $data;

    public function getId()
    {
        return $this->id;
    }
    public function getInsumo()
    {
        return $this->insumo;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function getDia()
    {
        return $this->dia;
    }
    public function getMes()
    {
        return $this->mes;
    }
    public function getData()
    {
        return $this->data;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setInsumo($insumo)
    {
        $this->insumo = $insumo;
    }
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
    public function setDia($dia)
    {
        $this->dia = $dia;
    }
    public function setMes($mes)
    {
        $this->mes = $mes;
    }
    public function setData($data)
    {
        $this->data = $data;
    }

    public function inserirContagem()
    {
        try {
            $nomeTabela = $this->getInsumo();
            $sql = MySql::conectar()->prepare("INSERT INTO `contagens` (id, insumo, quantidade, dia, mes, dataDiaMes, nome_loja) VALUES (null, ?, ?, ?, ?, ?, ?)");
            $sql->execute(array($this->getInsumo(), $this->getQuantidade(), $this->getDia(), $this->getMes(), $this->getData(), $_SESSION['nomeLoja']));
            return true;
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }

    public function reconhecerInsumosParaContagem()
    {
        try {
            $sql = MySql::conectar()->prepare("SELECT * FROM `insumos` WHERE `nome_loja` = ?");
            $sql->execute(array($_SESSION['nomeLoja']));
            if ($sql->rowCount() > 1) {
                $info = $sql->fetchAll();
                $quantidade = 0;
                foreach ($info as $key => $value) {
                    foreach ($value as $key => $value) {
                        if ($key == "nome") {
                            echo '<span id="nomeInsumo">' . $value . '</span>';
                            echo '<input type="text" name="quantidade[' . $quantidade . ']" placeholder="Insira a contagem..." required>';
                            $quantidade++;
                        }
                    }
                }
            } elseif ($sql->rowCount() == 1) {
                $info = $sql->fetch();
                $quantidade = 0;
                foreach ($info as $key => $value) {
                    if ($key == "nome") {
                        echo '<span id="nomeInsumo">' . $value . '</span>';
                        echo '<input type="text" name="quantidade[' . $quantidade . ']" placeholder="Insira a contagem..." required>';
                        $quantidade++;
                    }
                }
            }
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }

    public function reconhecerInsumosParaInserir()
    {
        try {
            $insumos = [];
            $sql = MySql::conectar()->prepare("SELECT * FROM `insumos` WHERE `nome_loja` = ?");
            $sql->execute(array($_SESSION['nomeLoja']));
            if ($sql->rowCount() > 1) {
                $info = $sql->fetchAll();
                foreach ($info as $key => $value) {
                    foreach ($value as $key => $value) {
                        if ($key == "nome") {
                            array_push($insumos, $value);
                        }
                    }
                }
                return $insumos;
            } elseif ($sql->rowCount() == 1) {
                $info = $sql->fetch();
                foreach ($info as $key => $value) {
                    if ($key == "nome") {
                        array_push($insumos, $value);
                    }
                }
                return $insumos;
            }
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }
}
?>