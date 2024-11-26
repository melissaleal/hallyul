<div class="card text-center d-flex cardlote">
    <div class="card-body">
        <h5 class="card-title">
            <?= $nomelote; ?>
        </h5>
        <p class="card-text">
            <?= $preco; ?>
        </p>
        <p class="card-text">
            Data de compra: <?= $datacompra; ?>
        </p>
        <p class="card-text">
            Data de pagamento: <?= $datapgto; ?>
        </p>
        <p class="card-text">
            Status de pagamento: <?= $statuspgto; ?>
        </p>
        <a href="lote.php?lotecode=<?= $lotecode; ?>&cegcode=<?= $cegcode; ?>">Veja aqui!</a>
        <a href="../../controller/lotedelete.php?lotecode=<?= $lotecode; ?>"></a>
        <a href="../../controller/loteupdate.php?lotecode=<?= $lotecode; ?>"></a>
    </div>
</div>