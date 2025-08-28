<h2>INSERIR CONTAGEM</h2>
<form method="post" id="form-inserir-insumo">
    <span>Dia da contagem</span>
    <select name="diaSemana">
        <option value="segunda-feira">segunda-feira</option>
        <option value="terca-feira">terça-feira</option>
        <option value="quarta-feira">quarta-feira</option>
        <option value="quinta-feira">quinta-feira</option>
        <option value="sexta-feira">sexta-feira</option>
        <option value="sabado">sábado</option>
        <option value="domingo">domingo</option>
    </select>

    <span>Mês da contagem</span>
    <select name="mes">
        <option value="janeiro">Janeiro</option>
        <option value="fevereiro">Fevereiro</option>
        <option value="marco">Março</option>
        <option value="abril">Abril</option>
        <option value="maio">Maio</option>
        <option value="junho">Junho</option>
        <option value="julho">Julho</option>
        <option value="agosto">Agosto</option>
        <option value="setembro">Setembro</option>
        <option value="outubro">Outubro</option>
        <option value="novembro">Novembro</option>
        <option value="dezembro">Dezembro</option>
    </select>
    <span>Data Completa da Contagem</span>
    <input type="date" name="dataDiaMes">
    <?php
    include(INCLUDE_PATH . 'Controller/Contagem.php');
    $contagemController = new ContagemController();
    $contagemController->reconhecerInsumos();
    ?>
    <input type="submit" value="Enviar contagem" name="enviar">
</form>

<?php
    if(isset($_POST['enviar'])){
        $contagemController->loopDeReconhecimentoEInsercao();
    }
?>