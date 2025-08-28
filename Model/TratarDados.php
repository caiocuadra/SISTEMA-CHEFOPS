<?php
/*
    Autor: Caio Henrique Mota Cuadra
    Data: 27/08/2025
*/

class tratarDados
{

    private $diaAnterior;
    private $diaAtual;

    private $quantidadeAnterior;
    private $quantidadePosterior;

    public function setDiaAnterior($diaAnterior)
    {
        $this->diaAnterior = $diaAnterior;
    }
    public function setDiaAtual($diaAtual)
    {
        $this->diaAtual = $diaAtual;
    }

    public function getDiaAnterior()
    {
        return $this->diaAnterior;
    }
    public function getDiaAtual()
    {
        return $this->diaAtual;
    }
    public function retornaDiaQuantidadeAnterior($dia)
    {
        switch ($dia) {
            case 'segunda-feira':
                return 'domingo';

            case 'terca-feira':
                return 'segunda-feira';

            case 'quarta-feira':
                return 'terca-feira';

            case 'quinta-feira':
                return 'quarta-feira';

            case 'sexta-feira':
                return 'quinta-feira';

            case 'sabado':
                return 'sexta-feira';

            case 'domingo':
                return 'sabado';

            default:
                return 'null';
        }
    }

    public function selecionarDia($dia)
    {
        $diaAnterior = $this->retornaDiaQuantidadeAnterior($dia);
        $this->setDiaAnterior($diaAnterior);
        $this->setDiaAtual($dia);
    }

    public function retornaMediaDoItemPorDiaDaSemana($item, $dia)
    {
        try {
            $this->selecionarDia($dia);
            $sql = MySql::conectar()->prepare("SELECT AVG(quantidade) FROM contagens WHERE insumo = ? AND dia = ?");
            $sql->execute(array($item, $this->getDiaAtual()));

            $info = $sql->fetch();
            return $info[0];

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function retornaMediaDePedidoPorDiaDaSemana($item, $dia)
    {
        try {
            $this->selecionarDia($dia);
            $sql = MySql::conectar()->prepare("SELECT AVG(quantidade) FROM pedidos WHERE insumo = ? AND dia = ?");
            $sql->execute(array($item, $this->getDiaAtual()));

            $info = $sql->fetch();
            return $info[0];

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function obtemMedia($value)
    {


    }

    public function reconhecerInsumosParaContagem($dia)
    {
        try {
            $sql = MySql::conectar()->prepare("SELECT * FROM `insumos` WHERE `nome_loja` = ?");
            $sql->execute(array($_SESSION['nomeLoja']));
            $diaAnterior = $this->retornaDiaQuantidadeAnterior($dia);
            if ($sql->rowCount() > 1) {
                $info = $sql->fetchAll();
                foreach ($info as $key => $value) {
                    foreach ($value as $key => $value) {
                        if ($key == "nome") {
                            echo '<span id="dadoTratado">';
                            $valueSanitizado = strtoupper($value);
                            $valueSanitizado2 = str_replace("_", " ", $valueSanitizado);
                            echo $valueSanitizado2 . ": ";
                            $quantidadeAnterior = $this->retornaMediaDoItemPorDiaDaSemana($value, $diaAnterior);
                            $quantidadePosterior = $this->retornaMediaDoItemPorDiaDaSemana($value, $dia);
                            $quantidadePedidoPosterior = $this->retornaMediaDePedidoPorDiaDaSemana($value, $dia);
                            $quantidadePosterior = $quantidadePosterior - $quantidadePedidoPosterior;
                            $consumo = $quantidadeAnterior - $quantidadePosterior;
                            echo $consumo;
                            echo "</span>";
                        }
                    }
                }
            } elseif ($sql->rowCount() == 1) {
                $info = $sql->fetch();
                $quantidade = 0;
                foreach ($info as $key => $value) {
                    if ($key == "nome") {
                        echo '<span id="dadoTratado">';
                        $valueSanitizado = strtoupper($value);
                        $valueSanitizado2 = str_replace("_", " ", $valueSanitizado);
                        echo $valueSanitizado2 . ": ";
                        echo $this->retornaMediaDoItemPorDiaDaSemana($value, $dia);
                        echo "</span>";
                    }
                }
            }
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }

}

?>