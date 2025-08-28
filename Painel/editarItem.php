<h2>EDITAR INSUMO</h2>
<form method="post" id="form-inserir-insumo">
    <select name="insumoSelecionado">
        <?php
        include(INCLUDE_PATH . 'Controller/Insumo.php');
        $controlerInsumo = new InsumoController();
        $controlerInsumo->reconhecerInsumos();
        ?>
    </select>
    <input type="text" name="editar_insumo" placeholder="Editar o nome do item." id="input1">
    <input type="submit" value="Editar" name="editarInsumo">
    <input type="submit" value="Excluir" name="excluirInsumo">
</form>


<?php
    if(isset($_POST['editarInsumo'])){
        $controlerInsumo->atualizarInsumo($_POST['insumoSelecionado'], $_POST['editar_insumo']);
    }

    if(isset($_POST['excluirInsumo'])){
        $controlerInsumo->removerInsumos($_POST['insumoSelecionado']);
        header("Location: /AuxiliarGestorHamburgueria");
    }
?>