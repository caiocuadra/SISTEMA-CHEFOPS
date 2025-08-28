<form method="post">
    <span>Dia da semana</span>
    <select name="diaSemanaPaginaInicial">
        <option value="segunda-feira">segunda-feira</option>
        <option value="terca-feira">terça-feira</option>
        <option value="quarta-feira">quarta-feira</option>
        <option value="quinta-feira">quinta-feira</option>
        <option value="sexta-feira">sexta-feira</option>
        <option value="sabado">sábado</option>
        <option value="domingo">domingo</option>
    </select>
    <input type="submit" value="reconhecer" name="reconhecer">
</form>

<?php
    require_once(INCLUDE_PATH . "Model/TratarDados.php");
    $tratarDados = new tratarDados();
    if(isset($_POST['reconhecer'])){
        $tratarDados->reconhecerInsumosParaContagem($_POST['diaSemanaPaginaInicial']);
    }
?>