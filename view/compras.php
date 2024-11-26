<?php
    include '../controller/functions.php';
    authenticate();
    include '../model/connection.php';
    include 'components/head.php';
    include 'components/header.php';

    $sql = "SELECT * FROM compraGrupo cg
    INNER JOIN cegADM ca ON cg.idCompraGrupo = ca.idCEG
    WHERE ca.idADM = ".$_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $cegs = $command->fetchAll();
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Suas CEGs';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <a href="cegregistration.php" class="col-2 btnpurple">Cadastrar Compra</a>
        </div>

        <div class="row">
            <?php
                foreach($cegs as $ceg){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $nomeceg = $ceg['nomeCompraGrupo'];
                    $cegcode = $ceg['idCompraGrupo'];
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