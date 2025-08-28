

<div class="box-login" id="box-login">
    <form method="post" id="form-login">
        <h2>Faça o Login!</h2>
        <h3>Email:</h3>
        <input type="email" name="email" id="email" required>
        <h3>Senha:</h3>
        <input type="password" name="senha" id="senha" required>
        <input type="submit" value="Login" name="login" id="login">
    </form>
</div>

<?php
    include(INCLUDE_PATH .'Controller/lojaController.php');
    $controlerLoja = new LojaController();
    if(isset($_POST['login'])){ 
        
        $controlerLoja->logar($_POST['email'], $_POST['senha']);
    }
?>