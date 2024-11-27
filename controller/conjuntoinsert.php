<?php
    session_start();
    include '../model/connection.php';

    $nome = htmlspecialchars($_POST['nome']);
    $evento = htmlspecialchars($_POST['evento']);

    $sql = "INSERT INTO conjunto (nome, idEvento) VALUES (:nome, :evento);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nome", $nome);
    $command->bindParam(":evento", $evento);
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
?>