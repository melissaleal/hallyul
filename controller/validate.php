<?php
    session_start();

    include '../model/connection.php';

    $user = htmlspecialchars($_POST['user']);
    $password = md5(htmlspecialchars($_POST['password']));
    $sql = 'SELECT * FROM usuario WHERE usuario = :us AND senha = :pass';

    $command = $pdo->prepare($sql);
    $command->bindParam(":us", $user);
    $command->bindParam(":pass", $password);
    $command->execute();
    $result = $command->fetch();

    if(isset($result['id'])){
        // o comando select retornou dados de um cliente com email e senha corretos
        $_SESSION['idUsuario'] = $result['id'];
        $_SESSION['nomeUsuario'] = $result['nome'];
        $_SESSION['tipoUsuario'] = $result['tipo'];
        header("Location: http://localhost/cegs/view/index.php");
    }else{
        include '../view/components/head.php';
        include '../view/components/header.php';
?>
<main>
    <p>Usuário não cadastrado ou senha inválida</p>
    <p><a href="../view/login.php">Tentar novamente</a></p>
</main>
<?php
    }
    include '../view/components/footer.php';
    include '../view/components/foot.php';
?>