<div id="menu-vertical">
    <div id="lista-menu">
        <a href="Home">Página Inicial</a>
        <br>
        <a href="inserirItem">Inserir Item</a>
        <br>
        <a href="editarItem">Editar Item</a>
        <br>
        <a href="inserirContagem">Inserir Contagem</a>
        <br>
        <a href="">Editar Contagem</a>
        <br>
        <a href="inserirPedido">Inserir Pedidos</a>
        <br>
        <a href="">Editar Pedidos</a>
        <br>
        <a href="">Gerar Relatórios</a>
        <br>
        <a href="">Sair</a>
    </div>
</div>
<div id="content">
    <div id="menu-button">
        <i data-tooltip="Abrir/Fechar Menu" class="fa-solid fa-bars"></i>
    </div>
    <div id="wrapper-content">
        <?php
            $urlContent = isset($_GET['url']) ? $_GET['url'] : 'paginaInicial';
            if(file_exists(__DIR__."/../Painel/" . $urlContent . ".php")){
                include __DIR__."/../Painel/" . $urlContent . ".php";
            }else{
                include __DIR__."/../Painel/paginaInicial.php";
            }
        ?>
    </div>
</div>