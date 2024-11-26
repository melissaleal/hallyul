<div class="card text-center d-flex cardconjunto">
    <div class="card-body">
        <h5 class="card-title">
            <?= $nomeconjunto; ?>
        </h5>
        <p class="card-text">
            <?= $artista; ?>
        </p>
        <p class="card-text">
            <?= $evento; ?>
        </p>
        <p class="card-text">
            <?= $descricao; ?>
        </p>
        <a href="conjunto.php?conjuntocode=<?= $conjuntocode; ?>">Veja aqui!</a>
        <a href="../../controller/conjuntodelete.php?conjuntocode=<?= $conjuntocode; ?>"></a>
        <a href="../../controller/conjuntoupdate.php?conjuntocode=<?= $conjuntocode; ?>"></a>
    </div>
</div>