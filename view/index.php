<?php
    include '../controller/functions.php';
    authenticate();
    include 'components/head.php';
    include 'components/header.php';
?>
<main>
<div class="container-fluid">
    <?php
        $size = 3;
        $title = 'Olá, '.$_SESSION['tipoUsuario'].' :) Bom ver você de novo!';
        include 'components/centertitle.php';
    ?>
    <div class="d-flex justify-content-center">
        <?php
            if(($_SESSION['tipoUsuario'] == 'GOM') || ($_SESSION['tipoUsuario'] == 'GOMllector')){
                $titulo = 'Suas compras em grupo';
                $caminho = 'compras.php';
                $botao = 'Detalhes';
                include 'components/glasscontainer.php';
                $titulo = 'Seus conjuntos de itens';
                $caminho = 'conjuntos.php';
                $botao = 'Detalhes';
                include 'components/glasscontainer.php';
            }
            if(($_SESSION['tipoUsuario'] == 'Collector') || ($_SESSION['tipoUsuario'] == 'GOMllector')){
                $titulo = 'Seus itens';
                $caminho = 'itens.php';
                $botao = 'Detalhes';
                include 'components/glasscontainer.php';
            }
        ?>
    </div>
</div>
</main>
<?php
    include 'components/footer.php';
    include 'components/foot.php';
?>