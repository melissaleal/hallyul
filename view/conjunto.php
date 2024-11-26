<?php
    include '../controller/functions.php';
    authenticate();
    if($_SESSION['tipoUsuario'] != 'GOM'){
        header("Location: http://localhost/cegs/view/login.php");
    }else{
        include '../model/connection.php';
        include 'components/head.php';
        include 'components/header.php';

        $idConjuntoItens = htmlspecialchars($_GET['conjuntocode']);

        $sql = "SELECT * FROM conjuntoItens WHERE idConjuntoItens = :ci;";
        $command = $pdo->prepare($sql);
        $command->bindParam(":ci", $idConjuntoItens);
        $command->execute();
        $res = $command->fetch();

        $sql = "SELECT * FROM item i
        WHERE idConjuntoItem = ". $res['idConjuntoItens'].";";

        $command = $pdo->query($sql);
        $resultitens = $command->fetchAll();
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Itens do conjunto '.$res['nomeConjuntoItens'];
                include 'components/lefttitle.php';
            ?>
        </div>
        <div class="row">
            <a href="itemregistration.php?conjuntocode=<?= $idConjuntoItens ?>" class="col-2 btnpurple">Adicionar Item</a>
        </div>
        <div class="row">
            <?php
                foreach($resultitens as $item){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $size = 5;
                    $nomeitem = $item['nomeItem'];
                    $descricao = $item['descricaoItem'];
                    $preco = $item['precoItem'];
                    include 'components/carditem3.php';
                ?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</main>
<?php
    }
    include 'components/footer.php';
    include 'components/foot.php';
?>