<?php
    session_start();
    include '../model/connection.php';

    $nomeCompraGrupo = htmlspecialchars($_POST['name']);
    $descricao = htmlspecialchars($_POST['description']);
    $dataInicio = htmlspecialchars($_POST['dti']);
    $dataEncerramento = htmlspecialchars($_POST['dte']);

    $sql = "INSERT INTO compraGrupo (nomeCompraGrupo, descricao, dataInicio) VALUES (:nomeCompraGrupo, :descricao, :dataInicio);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeCompraGrupo", $nomeCompraGrupo);
    $command->bindParam(":descricao", $descricao);
    $command->bindParam(":dataInicio", $dataInicio);
    $command->execute();

    $sql = "SELECT idCompraGrupo FROM compraGrupo WHERE nomeCompraGrupo = :nomeCompraGrupo AND  descricao = :descricao AND dataInicio = :dataInicio";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeCompraGrupo", $nomeCompraGrupo);
    $command->bindParam(":descricao", $descricao);
    $command->bindParam(":dataInicio", $dataInicio);
    $command->execute();
    $query = $command->fetch();
    $idCompraGrupo = $query['idCompraGrupo'];

    $sql = "INSERT INTO cegADM (idCEG, idADM) VALUES (:idCEG, :idADM);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":idCEG", $idCompraGrupo);
    $command->bindParam(":idADM", $_SESSION['idUsuario']);
    $success = $command->execute();


    if ($success) {
        header("Location: http://localhost/cegs/view/index.php");//ALTERAR
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