<?php
    session_start();
    include '../model/connection.php';

    $nomeUsuario = htmlspecialchars($_POST['name']);
    $usuarioUsuario = htmlspecialchars($_POST['user']);
    $senhaUsuario = md5(htmlspecialchars($_POST['password']));
    $cpfUsuario = htmlspecialchars($_POST['cpf']);
    $emailUsuario = htmlspecialchars($_POST['email']);
    $dataNascUsuario = htmlspecialchars($_POST['bdt']);
    $tipoUsuario = htmlspecialchars($_POST['usertype']);
    $telefoneUsuario = htmlspecialchars($_POST['phone']);

    $sql = "INSERT INTO usuario (nomeUsuario, usuarioUsuario, senhaUsuario, cpfUsuario, emailUsuario, dataNascUsuario, tipoUsuario) VALUES (:nomeUsuario, :usuarioUsuario, :senhaUsuario, :cpfUsuario, :emailUsuario, :dataNascUsuario, :tipoUsuario);";

    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeUsuario", $nomeUsuario);
    $command->bindParam(":usuarioUsuario", $usuarioUsuario);
    $command->bindParam(":senhaUsuario", $senhaUsuario);
    $command->bindParam(":cpfUsuario", $cpfUsuario);
    $command->bindParam(":emailUsuario", $emailUsuario);
    $command->bindParam(":dataNascUsuario", $dataNascUsuario);
    $command->bindParam(":tipoUsuario", $tipoUsuario);
    $command->execute();

    $sql = "SELECT idUsuario FROM usuario WHERE nomeUsuario = :nomeUsuario AND cpfUsuario = :cpfUsuario";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeUsuario", $nomeUsuario);
    $command->bindParam(":cpfUsuario", $cpfUsuario);
    $command->execute();
    $query = $command->fetch();
    $idUsuario = $query['idUsuario'];

    $sql = "INSERT INTO telefoneUsuario (telefoneUsuario, idUsuario) VALUES (:telefoneUsuario, :idUsuario);";
    $command = $pdo->prepare($sql);
    $command->bindParam(":telefoneUsuario", $telefoneUsuario);
    $command->bindParam(":idUsuario", $idUsuario);
    $success = $command->execute();

    if ($success) {
        header("Location: http://localhost/cegs/view/login.php");
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