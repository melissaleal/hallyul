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
        $title = 'Cadastro de CEGs';
        include 'components/centertitle.php';
        ?>
        <div class="">
            <form action="../controller/ceginsert.php" method="POST">
                <div>
                    <label for="name">Nome da CEG</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" maxlength="90"></textarea>
                </div>
                <div>
                    <label for="dti">Data de início</label>
                    <input type="date" name="dti" required>
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