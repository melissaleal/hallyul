<?php
    include '../controller/functions.php';
    authenticate();
    include '../model/connection.php';
    include 'components/head.php';
    include 'components/header.php';

    /*$sql = "SELECT * FROM item i 
    INNER JOIN usuarioItem ui ON i.idItem = ui.idItem
    WHERE ui.idUsuario = ".$_SESSION['idUsuario'].";";
    */
    $sql = "SELECT * FROM item i 
    INNER JOIN usuarioItemLote ui ON i.idItem = ui.idItemLote
    INNER JOIN itemLote il ON i.idItem = il.idItem
    INNER JOIN lote l ON il.idLote = l.idLote
    INNER JOIN compraGrupo cg ON l.idCEG = cg.idCompraGrupo
    INNER JOIN cegADM ca ON cg.idCompraGrupo = ca.idCEG
    WHERE ui.idUsuario = ".$_SESSION['idUsuario']." AND ca.idADM = ".$_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $itens = $command->fetchAll();
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Seus itens';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <?php
                foreach($itens as $item){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $nomeitem = $item['nomeItem'];
                    $disponibilidade = $item['disponibilidadeItem'];
                    $status = $item['statusItem'];
                    $descricao = $item['descricaoItem'];
                    $preco = $item['precoItem'];

                    $sql = "SELECT nomeConjuntoItens FROM conjuntoItens ci
                    WHERE ci.idConjuntoItens = ".$item['idConjuntoItem'].";";
                    $command = $pdo->query($sql);
                    $result = $command->fetch();
                    $conjunto = $result['nomeConjuntoItens'];

                    $sql = "SELECT nomeCompraGrupo FROM compraGrupo cg
                    WHERE cg.idCompraGrupo = ".$item['idCEG'].";";
                    $command = $pdo->query($sql);
                    $result = $command->fetch();
                    $ceg = $result['nomeCompraGrupo'];
                    
                    $itemcode = $item['idItem'];
                    include 'components/carditem2.php';
                ?>
            </div>
            <?php  
                }
            ?>
        </div>
    </div>
</main>
<?php
    include 'components/footer.php';
    include 'components/foot.php';
?>