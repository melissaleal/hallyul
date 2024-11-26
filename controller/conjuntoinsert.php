<?php
    session_start();
    include '../model/connection.php';

    $idUsuario = htmlspecialchars($_POST['gom']);
    $nomeConjuntoItens = htmlspecialchars($_POST['name']);
    $descricaoConjuntoItens = htmlspecialchars($_POST['description']);
    $artistaConjuntoItens = htmlspecialchars($_POST['artist']);
    $eventoConjuntoItens = htmlspecialchars($_POST['event']);

    $sql = "INSERT INTO conjuntoItens (nomeConjuntoItens, artistaConjuntoItens, eventoConjuntoItens, descricaoConjuntoItens, idUsuario) VALUES (:nome, :artista, :evento, :descricao, :user);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nome", $nomeConjuntoItens);
    $command->bindParam(":descricao", $descricaoConjuntoItens);
    $command->bindParam(":artista", $artistaConjuntoItens);
    $command->bindParam(":evento", $eventoConjuntoItens);
    $command->bindParam(':user', $idUsuario);
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