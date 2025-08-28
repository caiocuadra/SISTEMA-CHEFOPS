<?php
/*
    Autor: Caio Henrique Mota 
*/
class Insumo
{
    private $id;
    private $nome;


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


    public function adicionarInsumo()
    {
        try {
            $nomeInsumo = trim($this->getNome());
            $nomeInsumoSanitizado1 = str_replace(" ", "_", $nomeInsumo);
            $nomeInsumoSanitizado2 = strtolower($nomeInsumoSanitizado1);
            $sql = MySql::conectar()->prepare("INSERT INTO insumos (id, nome, nome_loja) VALUES (null, ?, ?)");
            $sql->execute(array($nomeInsumoSanitizado2, $_SESSION['nomeLoja']));
            exit("Insumo adicionado com sucesso.");
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }
    public function reconhecerInsumos()
    {
        try {
            $sql = MySql::conectar()->prepare("SELECT * FROM `insumos` WHERE `nome_loja` = ?");
            $sql->execute(array($_SESSION['nomeLoja']));
            if ($sql->rowCount() > 1) {
                $info = $sql->fetchAll();
                foreach ($info as $key => $value) {
                    foreach ($value as $key => $value) {
                        if ($key == "nome") {
                            echo "<option>";
                            echo $value;
                            echo "</option>";
                        }
                    }
                }
            } elseif ($sql->rowCount() == 1) {
                $info = $sql->fetch();
                foreach ($info as $key => $value) {
                    if ($key == "nome") {
                        echo "<option>";
                        echo $value;
                        echo "</option>";
                    }
                }
            }
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }

    public function atualizarInsumo($nomeAntigo, $nomeNovo)
    {
        try {
            $sql = MySql::conectar()->prepare("UPDATE `insumos` SET `nome` = ? WHERE `nome` = ? AND `nome_loja` = ?");
            $sql->execute([$nomeNovo, $nomeAntigo, $_SESSION['nomeLoja']]);
            header("Location: /AuxiliarGestorHamburgueria/editarItem");
            exit("Insumo atualizado com sucesso.");
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }

    public function removeInsumo($nome)
    {
        try {
            $sql = MySql::conectar()->prepare("DELETE FROM insumos WHERE nome = ? AND `nome_loja` = ?");
            $sql->execute(array($nome, $_SESSION['nomeLoja']));
            header("Location: /AuxiliarGestorHamburgueria/editarItem");
            die("Insumo removido com sucesso.");
        } catch (\Throwable $th) {
            error_log($th->getMessage());
        }
    }
}

?>