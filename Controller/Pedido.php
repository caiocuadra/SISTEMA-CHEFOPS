<?php
/*
    Autor: Caio Henrique Mota Cuadra
    Data: 26/08/2025
*/
require_once(INCLUDE_PATH . "Model/Pedido.php");

class PedidoController
{
    public function adicionarContagem($insumo, $quantidade, $dia, $mes, $data)
    {
        $contagem = new Contagem();
        $contagem->setInsumo($insumo);
        $contagem->setQuantidade($quantidade);
        $contagem->setDia($dia);
        $contagem->setMes($mes);
        $contagem->setData($data);
        $contagem->inserirContagem();
    }

    public function loopDeReconhecimentoEInsercao()
    {
        $contagem = new Pedido();

        // pega todos os insumos uma única vez
        $insumos = $contagem->reconhecerInsumosParaInserir();
        $id = 0;
        
        
        foreach ($insumos as $insumo) {
            
            $idCompleto = "quantidade[$id]";
            $contagemLoop = new Pedido();
            $contagemLoop->setInsumo($insumo);
            // como no seu formulário os names são os nomes dos insumos:
            if (isset($_POST['quantidade'][$id])) {
                $contagemLoop->setQuantidade($_POST['quantidade'][$id]);
            }
            $contagemLoop->setDia($_POST['diaSemana']);
            $contagemLoop->setMes($_POST['mes']);
            $contagemLoop->setData($_POST['dataDiaMes']);
            if($contagemLoop->getQuantidade() == 0){

            }else{
                $contagemLoop->inserirPedido();
            }
            
            $id++;
        }

    }

    public function reconhecerInsumos()
    {
        $contagem = new Pedido();
        $contagem->reconhecerInsumosParaPedido();
    }

}
?>