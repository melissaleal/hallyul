<?php
include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <?php
            $size = 3;
            $title = 'Opa! Oi, você está chegando agora? Faça seu cadastro ^^';
            include 'components/centertitle.php';
            ?>
        </div>
        <div class="row">

        </div>
        <div class="row">
            <form action="../controller/userinsert.php" method="post" class="container-fluid">
                <div class="justify-content-center formuser">
                    <div class="row d-flex">
                        <div class="col-2">
                            <label for="name">Nome (pode ser um nick)</label>
                        </div>
                        <div class="col-4">
                            <input type="text" name="name" required>
                        </div>
                        <div class="col-2">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="col-4">
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div class="row d-flex ">

                    </div>
                    <div class="row d-flex">
                        <div class="col-2">
                            <label for="phone">Telefone</label>
                        </div>
                        <div class="col-4">
                            <input type="" name="phone" required>
                        </div>
                        <div class="col-2">
                            <label for="cpf">CPF</label>
                        </div>
                        <div class="col-4">
                            <input type="text" name="cpf" maxlength="11" required>
                        </div>
                    </div>
                    <div class="row d-flex">
                        <div class="col-2">
                            <label for="bdt">Data de nascimento</label>
                        </div>
                        <div class="col-4">
                            <input type="date" name="bdt" required>
                        </div>
                        <div class="col-2">
                            <label for="user">Usuário</label>
                        </div>
                        <div class="col-4">
                            <input type="text" name="user" required>
                        </div>
                    </div>

                    <div class="row d-flex">
                        <div class="col-2">
                            <label for="password">Senha</label>
                        </div>
                        <div class="col-4">
                            <input type="password" name="password" required>
                        </div>
                        <div class="col-2">
                            <label for="usertype">Você é...</label>
                        </div>
                        <div class="col-4">
                            <select name="usertype" id="usertype" required>
                                <option>GOM</option>
                                <option>Collector</option>
                                <option>GOMllector</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-2">
                            <button>Cadastrar</button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-6 text-center">
                            <a href="login.php">Já tem uma conta? Faça login ;)</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>