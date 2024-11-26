<?php
    include '../controller/functions.php';
    authenticate();
    if($_SESSION['tipoUsuario'] == 'Collector'){
        header("Location: http://localhost/cegs/view/login.php");
    }else{
        include '../model/connection.php';
        include 'components/head.php';
        include 'components/header.php';

        $idCompraGrupo = htmlspecialchars($_GET['cegcode']);

        $sql = "SELECT * FROM conjuntoItens";
        $command = $pdo->prepare($sql);
        $command->execute();
        $result = $command->fetchAll();
    }
?>
<main>
    <div class="container-fluid">
        <?php
        $size = 3;
        $title = 'Adicionar lote';
        include 'components/centertitle.php';
        ?>
        <div class="">
            <form action="../controller/loteinsert.php" method="POST">
                <input type="hidden" name="ceg" value="<?= $idCompraGrupo ?>">
                <div>
                    <label for="dtcompra">Data da compra</label>
                    <input type="date" name="dtcompra" id="dtcompra" required>
                </div>
                <div>
                    <label for="dtpgto">Data de pagamento</label>
                    <input type="date" name="dtpgto" id="dtpgto">
                </div>
                <div>
                    <label for="statuspgto">Status do pagamento</label>
                    <select name="statuspgto" id="statuspgto">
                        <option>Pendente</option>
                        <option>Pago</option>
                    </select>
                </div>
                <div>
                    <label for="set">Conjunto de itens</label>
                    <select name="set" id="set" required>
                        <?php
                            foreach($result as $conjunto){
                        ?>
                            <option value="<?= $conjunto['idConjuntoItens']; ?>"><?= $conjunto['nomeConjuntoItens']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <button>Adicionar lote</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>