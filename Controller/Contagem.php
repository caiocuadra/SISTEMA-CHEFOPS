<?php
/*
    Autor: Caio Henrique Mota Cuadra
    Data: 26/08/2025
*/
require_once(INCLUDE_PATH . "Model/Contagem.php");

class ContagemController
{
    public function adicionarContagem($insumo, $quantidade, $dia, $mes, $data)
    {
        $contagem = new Contagem();
        $contagem->setInsumo($insumo);
        $quantidadeSanitizada = str_replace(',', '.', $quantidade);
        $contagem->setQuantidade($quantidadeSanitizada);
        $contagem->setDia($dia);
        $contagem->setMes($mes);
        $contagem->setData($data);
        $contagem->inserirContagem();
    }

    public function loopDeReconhecimentoEInsercao()
    {
        $contagem = new Contagem();

        // pega todos os insumos uma única vez
        $insumos = $contagem->reconhecerInsumosParaInserir();
        $id = 0;
        
        
        foreach ($insumos as $insumo) {
            
            $idCompleto = "quantidade[$id]";
            $contagemLoop = new Contagem();
            $contagemLoop->setInsumo($insumo);
            // como no seu formulário os names são os nomes dos insumos:
            if (isset($_POST['quantidade'][$id])) {
                $contagemLoop->setQuantidade($_POST['quantidade'][$id]);
            }
            $contagemLoop->setDia($_POST['diaSemana']);
            $contagemLoop->setMes($_POST['mes']);
            $contagemLoop->setData($_POST['dataDiaMes']);
            $contagemLoop->inserirContagem();
            $id++;
        }

    }

    public function reconhecerInsumos()
    {
        $contagem = new Contagem();
        $contagem->reconhecerInsumosParaContagem();
    }

}
?>