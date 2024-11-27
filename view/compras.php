<?php
    include '../controller/functions.php';
    authenticate();
    include '../model/connection.php';
    include 'components/head.php';
    include 'components/header.php';

    $sql = "SELECT * FROM compra cm
    INNER JOIN compraGOM cg ON cg.idCompra = cm.id WHERE cg.idGOM = :idUsuario;";
    $command = $pdo->prepare($sql);
    $command->bindParam(':idUsuario', $_SESSION['idUsuario']);
    $command->execute();
    $compras = $command->fetchAll();
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Suas Compras';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <a href="cegregistration.php" class="col-2 btnpurple">Cadastrar Compra</a>
        </div>

        <div class="row">
            <?php
                foreach($compras as $compra){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $nome = $compra['nome'];
                    $ceg = $compra['idCompra'];
                    include 'components/cardceg.php';
                ?>
            </div>
            <?php  
                }
            ?>
        </div>
    </div>
</main>
<?php
    include 'components/footer.php';
    include 'components/foot.php';
?>