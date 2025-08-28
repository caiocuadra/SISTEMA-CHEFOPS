<?php
/*
Autor: Caio Henrique Mota Cuadra
Data: 23/08/2025
*/
class Loja
{
    private $id;
    private $nome;
    private $codigo;
    private $email;
    private $senha;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function cria_sessao()
    {
        $_SESSION['loginCHEFOPS'] = true;
        $_SESSION['loja_id'] = $this->getId();
        $_SESSION['loja_nome'] = $this->getNome();
        $_SESSION['loja_email'] = $this->getEmail();
        $_SESSION['loja_codigo'] = $this->getCodigo();
    }


    public function login_loja($email_inserido, $senha_inserida)
    {
        $sql = MySql::conectar()->prepare("SELECT * FROM `lojas` WHERE email = ?");
        $sql->execute(array($email_inserido));
        if ($sql->rowCount() == 1) {
            $info = $sql->fetch();
            $this->setEmail($info["email"]);
            $this->setId($info["id"]);
            $this->setCodigo($info["codigo"]);
            $this->setSenha($info["senha"]);
            $this->setNome($info["nome"]);
            $_SESSION['nomeLoja'] = $this->getNome();
            if ($senha_inserida == $this->getSenha()) {
                $this->cria_sessao();
                header("Location: /AuxiliarGestorHamburgueria");
                die();
            }
        } else {
            echo '<div class="box-erro">Usuário ou senha incorretos.</div>';
        }
    }
}
?>