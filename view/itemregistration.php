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
    }
?>
<main>
    <div class="container-fluid">
        <?php
        $size = 3;
        $title = 'Cadastro de Item';
        include 'components/centertitle.php';
        ?>
        <div class="">
            <form action="../controller/iteminsert.php" method="POST">
                <input type="hidden" name="set" value="<?= $idConjuntoItens; ?>">
                <div>
                    <label for="name">Nome do item</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" maxlength="90"></textarea>
                </div>
                <div>
                    <label for="dispo">Disponibilidade</label>
                    <select name="dispo" id="dispo" required>
                        <option>Disponível</option>
                        <option>Indisponível</option>
                        <option>Reservado</option>
                    </select>
                </div>
                <div>
                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option>Seller</option>
                        <option>Enviado para o Brasil</option>
                        <option>GOM</option>
                        <option>Enviado para collector</option>
                    </select>
                </div>
                <div>
                    <label for="price">Preço</label>
                    <input type="number" step="any" name="price" required>
                </div>
                <div>
                    <button>Cadastrar item</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>