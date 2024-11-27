<?php
    include '../controller/functions.php';
    authenticate();
    include '../model/connection.php';
    include 'components/head.php';
    include 'components/header.php';

    $sql = "SELECT * FROM item i
    INNER JOIN itemLote il ON i.id = il.idItem
    INNER JOIN conjunto cn ON cn.id = i.idConjunto
    INNER JOIN lote l ON il.idLote = l.id
    WHERE il.idUsuario = :idUsuario;";
    $command = $pdo->prepare($sql);
    $command->bindParam(':idUsuario', $_SESSION['idUsuario']);
    $command->execute();
    $itens = $command->fetchAll();

?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
                $size = 4;
                $title = 'Seus itens';
                include 'components/lefttitle.php';
            ?>
        </div>

        <div class="row">
            <?php
                foreach($itens as $item){
            ?>
            <div class="col-6 mb-4">
                <?php
                    $itemcode = $item['id'];
                    $nome = $item['nome'];
                    $descricao = $item['descricao'];

                    $disponibilidade = $item['disponibilidade'];
                    $status = $item['status'];
                    $preco = $item['preco'];

                    $sql = "SELECT nome FROM conjunto
                    WHERE id = :conjuntocode;";
                    $command = $pdo->prepare($sql);
                    $command->bindParam(":conjuntocode", $item['idConjunto']);
                    $command->execute();
                    $conj = $command->fetch();
                    $conjunto = $conj['nome'];

                    $sql = "SELECT * FROM compra
                    WHERE id = :compracode;";
                    $command = $pdo->prepare($sql);
                    $command->bindParam(":compracode", $item['idCompra']);
                    $command->execute();
                    $compra = $command->fetch();
                    $ceg = $compra['nome'];
                    
                    $sql = "SELECT nome FROM usuario u
                    INNER JOIN compraGOM cg ON cg.idGOM =  u.id
                    WHERE cg.idCompra = :cegcode";
                    $command = $pdo->prepare($sql);
                    $command->bindParam(":cegcode", $compra['id']);
                    $command->execute();
                    $usuario = $command->fetch();
                    $gom = $usuario['nome'];

                    $sql = "SELECT categoria FROM tipoItem WHERE id = :tipocode;";
                    $command = $pdo->prepare($sql);
                    $command->bindParam(":tipocode", $item['tipoItem']);
                    $command->execute();
                    $tipoItem = $command->fetch();
                    $tipo = $tipoItem['categoria'];
                    
                    $sql = "SELECT l.id FROM lote l
                    INNER JOIN itemLote il ON il.idLote = l.id
                    INNER JOIN item i ON i.id = il.idItem
                    WHERE i.id = :itemcode;";
                    $command = $pdo->prepare($sql);
                    $command->bindParam(':itemcode', $itemcode);
                    $command->execute();
                    $idLote = $command->fetch();

                    include 'components/carditem2.php';
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