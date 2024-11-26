<?php
include '../controller/functions.php';
authenticate();
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
            <input type="hidden" name="gom" value="<?= $_SESSION['idUsuario']; ?>">
                <div>
                    <label for="name">Nome do conjunto</label>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" maxlength="90"></textarea>
                </div>
                <div>
                    <label for="artist">Artista / Grupo</label>
                    <select name="artist" id="artist" required>
                        <option>Stray Kids</option>
                        <option>Everglow</option>
                        <option>P1Harmony</option>
                    </select>
                </div>
                <div>
                    <label for="event">Evento</label>
                    <select name="event" id="event" required>
                        <option>Álbum</option>
                        <option>Season's Greetings</option>
                        <option>Parceria</option>
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