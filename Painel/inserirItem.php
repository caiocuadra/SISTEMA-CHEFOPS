<h2>INSERIR INSUMO</h2>
<form method="post" id="form-inserir-insumo">
    <span>Nome do Insumo:</span>
    <input type="text" name="nome" placeholder="Nome do Insumo..." id="input1">
    <input type="submit" value="Inserir" name="inserirInsumo">
</form>



<?php
    include(INCLUDE_PATH .'Controller/Insumo.php');
    $controlerInsumo = new InsumoController();
    if(isset($_POST['nome'])){ 
        $controlerInsumo->inserirInsumo($_POST['nome']);
    }
?>