<?php
    include '../controller/functions.php';
    authenticate();
    include '../model/connection.php';
    include 'components/head.php';
    include 'components/header.php';

    $sql = "SELECT DISTINCT * FROM conjuntoItens ci
    INNER JOIN lote l ON ci.idConjuntoItens = l.idConjuntoItens
    INNER JOIN compraGrupo cg ON l.idCEG = cg.idCompraGrupo
    INNER JOIN cegADM ca ON cg.idCompraGrupo = ca.idCEG
    WHERE ca.idADM = ".$_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $conjuntosemceg = $command->fetchAll();

    $sql = "SELECT DISTINCT *
    FROM conjuntoItens ci
    LEFT JOIN lote l ON ci.idConjuntoItens = l.idConjuntoItens
    WHERE l.idLote IS NULL AND ci.idUsuario = ". $_SESSION['idUsuario'].";";
    $command = $pdo->query($sql);
    $conjuntosisolados = $command->fetchAll();
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Seus conjuntos';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <a href="conjuntoregistration.php" class="col-2 btnpurple">Cadastrar conjunto</a>
        </div>

        <div class="row">
            <?php
                $size = 5;
                $title = 'Cadastrados em CEG';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <?php
                foreach($conjuntosemceg as $cc){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $nomeconjunto = $cc['nomeConjuntoItens'];
                    $artista = $cc['artistaConjuntoItens'];
                    $evento = $cc['eventoConjuntoItens'];
                    $descricao = $cc['descricaoConjuntoItens'];
                    $conjuntocode = $cc['idConjuntoItens'];
                    include 'components/cardconjunto.php';
                ?>
            </div>
            <?php  
                }
            ?>
        </div>

        <div class="row">
            <?php
                $size = 5;
                $title = 'Não cadastrados em CEG';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <?php
                foreach($conjuntosisolados as $cc){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $nomeconjunto = $cc['nomeConjuntoItens'];
                    $artista = $cc['artistaConjuntoItens'];
                    $evento = $cc['eventoConjuntoItens'];
                    $descricao = $cc['descricaoConjuntoItens'];
                    $conjuntocode = $cc['idConjuntoItens'];
                    include 'components/cardconjunto.php';
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