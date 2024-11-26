<?php
include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div class="container-fluid">
        <?php
        $size = 3;
        $title = 'Olá :) Vamos entrar?';
        include 'components/centertitle.php';
        ?>
    </div>
    <form action="../controller/validate.php" method="POST" class="container-fluid">
        <div class="justify-content-center formuser">
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="user">Usuário</label>
                </div>
                <div class="col-2">
                    <input type="text" name="user">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <label for="password">Senha</label>
                </div>
                <div class="col-2">
                    <input type="password" name="password">
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-2">
                    <button>Entrar</button>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <p class="col-6 text-center">
                    <a href="signin.php">Não tem uma conta? Faça seu cadastro :)</a>
                </p>
            </div>
        </div>
    </form>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>