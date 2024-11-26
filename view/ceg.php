<?php
    include '../controller/functions.php';
    authenticate();
    if($_SESSION['tipoUsuario'] == 'Collector'){
        header("Location: http://localhost/cegs/view/login.php");
    }else{
        include '../model/connection.php';
        include 'components/head.php';
        include 'components/header.php';

        $idCompraGrupo = htmlspecialchars($_GET['cegcode']);

        $sql = "SELECT * FROM compraGrupo WHERE idCompraGrupo = :c;";
        $command = $pdo->prepare($sql);
        $command->bindParam(":c", $idCompraGrupo);
        $command->execute();
        $res = $command->fetch();

        $sql = "SELECT * FROM conjuntoItens ci
        INNER JOIN lote l ON l.idConjuntoItens = ci.idConjuntoItens
        INNER JOIN compraGrupo cg ON l.idCEG = cg.idCompraGrupo
        WHERE cg.idCompraGrupo = ". $res['idCompraGrupo'].";";
        $command = $pdo->query($sql);
        $resultlote = $command->fetchAll();        
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Lotes da CEG '.$res['nomeCompraGrupo'];
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <a href="loteregistration.php?cegcode=<?= $idCompraGrupo ?>" class="col-2 btnpurple">Adicionar Lote</a>
        </div>

        <div class="row">
            <?php
                foreach($resultlote as $lote){
            ?>
                <div class="col-6 mb-4">
                    <?php
                            $size = 5;
                            $lotecode = $lote['idLote'];
                            $cegcode = $idCompraGrupo;
                            $nomelote = $lote['nomeConjuntoItens'];
                            $preco = 'hmm';
                            $datacompra = $lote['dataCompraLote'];
                            $datapgto = $lote['dataPagamentoLote'];
                            $statuspgto = $lote['statusPagamentoLote'];
                            include 'components/cardlote.php';
                    ?>
                </div>
            <?php
                }
            }
            ?>  
        </div>
    </div>
</main>
<?php
    include 'components/footer.php';
    include 'components/foot.php';
?>