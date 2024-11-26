<?php
    session_start();
    include '../model/connection.php';
    
    $idConjuntoItens = htmlspecialchars($_POST['set']);
    $idCEG = htmlspecialchars($_POST['ceg']);
    $dataCompraLote = htmlspecialchars($_POST['dtcompra']);
    $dataPagamentoLote = htmlspecialchars($_POST['dtpgto']);
    $statusPagamentoLote = htmlspecialchars($_POST['statuspgto']);
    echo $idCEG;
    $sql = "INSERT INTO lote (idConjuntoItens, idCEG, dataCompraLote, dataPagamentoLote, statusPagamentoLote) VALUES (:conjunto, :ceg,  :dtcompra, :dtpgto, :statuspgto);";
    $command = $pdo->prepare($sql);
    $command->bindParam(':conjunto', $idConjuntoItens);
    $command->bindParam(':ceg', $idCEG);
    $command->bindParam(':dtcompra', $dataCompraLote);
    $command->bindParam(':dtpgto', $dataPagamentoLote);
    $command->bindParam(':statuspgto', $statusPagamentoLote);
    $command->execute();

    $sql = "SELECT * FROM lote WHERE idConjuntoItens = :conjunto AND idCEG = :ceg AND dataCompraLote = :dtcompra;";
    $command = $pdo->prepare($sql);
    $command->bindParam(':conjunto', $idConjuntoItens);
    $command->bindParam(':ceg', $idCEG);
    $command->bindParam(':dtcompra', $dataCompraLote);
    $command->execute();
    $lote = $command->fetch();
    var_dump($lote);

    $sql = "SELECT * FROM item WHERE idConjuntoItem = ".$idConjuntoItens.";";
    $command = $pdo->query($sql);
    $itens = $command->fetchAll();

    foreach ($itens as $item) {
        $sql = "INSERT INTO itemLote (idItem, idLote) VALUES (:item, :lote);";
        $command = $pdo->prepare($sql);
        $command->bindParam(':item', $item['idItem']);
        $command->bindParam(':lote', $lote['idLote']);
        $success = $command->execute();

        if (!$success) {
            break;
        }
    }

    if ($success) {
        header("Location: http://localhost/cegs/view/ceg.php?cegcode=$idCEG");
    } else {
        include '../view/components/head.php';
        include '../view/components/header.php';
?>
<main>
    <p>FALHA AO CADASTRAR</p>
    <a href="../view/signin.php">Tentar novamente</a>
</main>
<?php
        include '../view/components/footer.php';
        include '../view/components/foot.php';
    }  
?>