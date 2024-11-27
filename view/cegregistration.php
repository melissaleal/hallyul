<?php
include '../controller/functions.php';
authenticate();
include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div  class="container-fluid">
        <?php
        $size = 3;
        $title = 'Cadastro de compras';
        include 'components/centertitle.php';
        ?>
        <div class="">
            <form action="../controller/ceginsert.php" method="POST">
                <div>
                    <label for="nome">Nome da compra</label>
                    <input type="text" name="nome" required>
                </div>
                <div>
                    <button>Cadastrar CEG</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>