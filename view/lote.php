<?php
    include '../controller/functions.php';
    authenticate();
    if($_SESSION['tipoUsuario'] == 'Collector'){
        header("Location: http://localhost/cegs/view/login.php");
    }else{
        include '../model/connection.php';
        include 'components/head.php';
        include 'components/header.php';

        $idLote = htmlspecialchars($_GET['lotecode']);
        $idCompraGrupo = htmlspecialchars($_GET['cegcode']);

        $sql = "SELECT * FROM item i
        INNER JOIN itemLote il ON il.idItem = i.idItem
        INNER JOIN conjuntoItens ci ON ci.idConjuntoItens = i.idConjuntoItem
        WHERE il.idLote = :lotecode;";
        $command = $pdo->prepare($sql);
        $command->bindParam(":lotecode", $idLote);
        $command->execute();
        $itens = $command->fetchAll();

        $sql = "SELECT * FROM lote l
        INNER JOIN conjuntoItens ci ON l.idConjuntoItens = ci.idConjuntoItens
        WHERE idLote = :lotecode;";
        $command = $pdo->prepare($sql);
        $command->bindParam(":lotecode", $idLote);
        $command->execute();
        $lote = $command->fetch();

        $sql = "SELECT * FROM compraGrupo cg
        INNER JOIN lote l ON cg.idCompraGrupo = l.idCEG WHERE idCompraGrupo = :c;";
        $command = $pdo->prepare($sql);
        $command->bindParam(":c", $idCompraGrupo);
        $command->execute();
        $ceg = $command->fetch();

        $sql = "SELECT 
                    numerados.posicao,
                    numerados.nomeConjuntoItens
                FROM (
                    SELECT 
                        l.idLote, 
                        ROW_NUMBER() OVER (ORDER BY l.dataCompraLote ASC) AS posicao,
                        l.idConjuntoItens, nomeConjuntoItens
                    FROM lote l
                    JOIN cegADM c ON l.idCEG = c.idCEG
                    JOIN conjuntoItens ci ON l.idConjuntoItens = ci.idConjuntoItens
                    WHERE c.idADM = :idADM
                ) AS numerados
                WHERE numerados.idLote = :idLote
                AND numerados.idConjuntoItens = :idConjuntoItens";
        $command = $pdo->prepare($sql);
        $command->bindParam(':idADM', $_SESSION['idUsuario']);
        $command->bindParam(':idLote', $idLote);
        $command->bindParam(':idConjuntoItens', $lote['idConjuntoItens']);
        $command->execute();
        $result = $command->fetch();
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = "Itens do lote ".$result['posicao']." do conjunto ". $result['nomeConjuntoItens'];
                include 'components/lefttitle.php';
            ?>
        </div>
        <div class="row">
            <p class="col-4 tagCEG"><?= $ceg['nomeCompraGrupo'] ?></p>
            <p class="col-3 tagConjunto"><?= $lote['nomeConjuntoItens'] ?></p>
        </div>

        <div class="row">
            <?php
                foreach($itens as $item){
            ?>
                <div class="col-6 mb-4">
                    <?php
                            $size = 5;
                            $itemcode = $item['idItem'];
                            $nomeitem = $item['nomeItem'];
                            $disponibilidade = $item['disponibilidadeItem'];
                            $status = $item['statusItem'];
                            $descricao = $item['descricaoItem'];
                            $sql = "SELECT * FROM usuario u
                            INNER JOIN usuarioItemLote ui ON ui.idUsuario = u.idUsuario
                            INNER JOIN itemLote il ON il.idItemLote = ui.idItemLote
                            WHERE il.idItem = :itemcode;
                            ";
                            $command = $pdo->prepare($sql);
                            $command->bindParam(":itemcode", $item['idItem']);
                            $command->execute();
                            $result = $command->fetch();

                            if (!isset($result['nomeUsuario'])){
                                $collector = '';
                            }else{
                                $collector = $result['nomeUsuario'];
                            }
                            $preco = $item['precoItem'];
                            include 'components/carditem.php';
                            
                    ?>
                </div>
            <?php
                }
            }
            ?>  
        </div>
    </div>
</main>
<?php
    include 'components/footer.php';
    include 'components/foot.php';
?>