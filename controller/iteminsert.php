<?php
    session_start();
    include '../model/connection.php';

    $idConjuntoItens = htmlspecialchars($_POST['set']);
    $nomeItem = htmlspecialchars($_POST['name']);
    $disponibilidadeItem = htmlspecialchars($_POST['dispo']);
    $statusItem = htmlspecialchars($_POST['status']);
    $descricaoItem = htmlspecialchars($_POST['description']);
    $precoItem = htmlspecialchars($_POST['price']);

    $sql = "INSERT INTO item (nomeItem, disponibilidadeItem, statusItem, descricaoItem, precoItem, idConjuntoItem) VALUES (:nome, :dispo, :stat, :descricao, :preco, :conjunto);";
    
    $command = $pdo->prepare($sql);
    $command->bindParam(':conjunto', $idConjuntoItens);
    $command->bindParam(':nome', $nomeItem);
    $command->bindParam(':dispo', $disponibilidadeItem);
    $command->bindParam(':stat', $statusItem);
    $command->bindParam(':descricao', $descricaoItem);
    $command->bindParam(':preco', $precoItem);
    $success = $command->execute();

    if ($success) {
        header("Location: http://localhost/cegs/view/index.php");
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