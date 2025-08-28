<?php
require_once(INCLUDE_PATH . "Model/Insumo.php");

class InsumoController {
    public function inserirInsumo($nome){
        if (empty($nome)) {
            return false;
        } else {
            $insumo = new Insumo();
            $insumo->setNome($_POST["nome"]);
            if($insumo->adicionarInsumo()){
                return true;
            }
        }
    }

    public function reconhecerInsumos(){
        $insumo = new Insumo();
        $insumo->reconhecerInsumos();
    }

    public function atualizarInsumo($nomeAntigo, $nomeNovo){
        if(empty($nomeAntigo) || empty($nomeNovo)) {
            return false;
        } else {
            $insumo = new Insumo();
            if($insumo->atualizarInsumo($nomeAntigo, $nomeNovo)){
                return true;
            }
        }
    }

    public function removerInsumos($nome){
        $insumo = new Insumo();
        if($insumo->removeInsumo($nome)){
            return true;
        }
    }
}
?>