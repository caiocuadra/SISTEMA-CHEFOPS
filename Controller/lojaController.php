<?php
require_once(INCLUDE_PATH . "Model/Loja.php");


class LojaController
{
    public function logar($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            return false;
        } else {
            $loja = new Loja();
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            if($loja->login_loja($email,$senha)){
                return true;
            }
        }
    }
}
?>