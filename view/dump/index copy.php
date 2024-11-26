<?php
    include '../controller/functions.php';
    authenticate();
    include '../model/connection.php';
    include 'components/head.php';
    include 'components/header.php';

    $sql = "SELECT * FROM item i INNER JOIN usuarioItem ui WHERE i.idItem = ui.idItem AND ui.idUsuario = ". $_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $resultitem = $command->fetchAll();

    $sql = "SELECT DISTINCT * FROM conjuntoItens ci
    INNER JOIN lote l ON ci.idConjuntoItens = l.idConjuntoItens
    INNER JOIN compraGrupo cg ON l.idCEG = cg.idCompraGrupo
    INNER JOIN cegADM ca ON cg.idCompraGrupo = ca.idCEG
    WHERE ca.idADM = ".$_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $result = $command->fetchAll();
    
    $sql = "SELECT DISTINCT *
    FROM conjuntoItens ci
    LEFT JOIN lote l ON ci.idConjuntoItens = l.idConjuntoItens
    WHERE l.idLote IS NULL AND ci.idUsuario = ". $_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $resultlote = $command->fetchAll();
?>
<main>
<div class="container-fluid">
    <?php
        $size = 3;
        $title = 'Olá, '.$_SESSION['tipoUsuario'].' :) Bom ver você de novo!';
        include 'components/centertitle.php';

        if(($_SESSION['tipoUsuario'] == 'GOM') || ($_SESSION['tipoUsuario'] == 'GOMllector')){
?>
            <div class="d-flex justify-content-center">
                <?php
                    if(($_SESSION['tipoUsuario'] == 'GOM') || ($_SESSION['tipoUsuario'] == 'GOMllector')){
                        $titulo = 'Suas compras em grupo';
                        $caminho = 'compras.php';
                        $botao = 'Detalhes';
                        include 'components/glasscontainer.php';
                    }
                ?>
            </div>
<?php
            $size = 4;
            $title = 'Suas CEGs';
            include 'components/lefttitle.php';
            foreach($result as $ceg){
                $size = 5;
                $cegname = $ceg['nomeCompraGrupo'];
                $cegcode = $ceg['idCompraGrupo'];
                include 'components/listceg.php';
            }
            $size = 4;
            $title = 'Seus conjuntos';
            include 'components/lefttitle.php';
            foreach($result as $lote){
                $size = 5;
                $lotecode = $lote['idLote'];
                $lotename = $lote['nomeConjuntoItens'];
                include 'components/listlote2.php';
            }
            foreach($resultlote as $lote){
                $size = 5;
                $lotecode = $lote['idLote'];
                $lotename = $lote['nomeConjuntoItens'];
                include 'components/listlote2.php';
            }
        }
        
        $sql = "SELECT * FROM item i 
    INNER JOIN usuarioItem ui ON i.idItem = ui.idItem
    INNER JOIN itemLote il ON i.idItem = il.idItem
    INNER JOIN lote l ON il.idLote = l.idLote
    INNER JOIN compraGrupo cg ON l.idCEG = cg.idCompraGrupo
    INNER JOIN cegADM ca ON cg.idCompraGrupo = ca.idCEG
    WHERE ui.idUsuario = ".$_SESSION['idUsuario']." AND ca.idADM = ".$_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $itens = $command->fetchAll();

        if(($_SESSION['tipoUsuario'] == 'Collector') || ($_SESSION['tipoUsuario'] == 'GOMllector')){
            $size = 4;
            $title = 'Seus itens';
            include 'components/lefttitle.php';
            foreach($resultitem as $item){
                $size = 5;
                $itemname = $item['nomeItem'];
                $status = $item['statusItem'];
                $preco = $item['precoItem'];
                include 'components/listitem.php';
            }
        }
    ?>
        <p><a href="../controller/logout.php">Log out</a></p>
</div>
</main>
<?php
    include 'components/footer.php';
    include 'components/foot.php';
?>