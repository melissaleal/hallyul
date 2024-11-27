<?php
include '../controller/functions.php';
authenticate();
include '../model/connection.php';

$sql = "SELECT * FROM evento;";
$command = $pdo->query($sql);
$eventos = $command->fetchAll();

include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div class="container-fluid">
        <?php
        $size = 3;
        $title = 'Cadastro de Conjunto de Itens';
        include 'components/centertitle.php';
        ?>
        <div class="">
            <form action="../controller/conjuntoinsert.php" method="POST">
                <div>
                    <label for="nome">Nome do conjunto</label>
                    <input type="text" name="nome" required>
                </div>
                <div>
                    <label for="evento">Evento</label>
                    <select name="evento" id="evento" required>
                        <?php
                            foreach($eventos as $evento){
                        ?>
                            <option value="<?= $evento['id'] ?>"><?= $evento['nome'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <button>Cadastrar conjunto</button>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>