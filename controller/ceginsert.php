<?php
    session_start();
    include '../model/connection.php';

    $nome = htmlspecialchars($_POST['nome']);

    $sql = "INSERT INTO compra (nome) VALUES (:nome);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nome", $nome);
    $command->execute();

    $sql = "SELECT id FROM compra WHERE nome = :nome";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nome", $nome);
    $command->execute();
    $query = $command->fetch();
    $id = $query['id'];

    $sql = "INSERT INTO compraGOM (idCompra, idGOM) VALUES (:idCompra, :idGOM);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":idCompra", $id);
    $command->bindParam(":idGOM", $_SESSION['idUsuario']);
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