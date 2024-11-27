<div class="card d-flex carditem">
    <div class="card-body">
        <h5 class="card-title">
            Item: <?= $nome; ?>
        </h5>
        <p class="card-text">
            Descrição: <?= $descricao; ?>
        </p>
        <p class="card-text">
            Tipo de item: <?= $tipo; ?>
        </p>
        <p class="card-text">
            Disponível: 
            <?php
                if (!$disponibilidade){
                    echo 'sim! para você <3';
                }
            ?>
        </p>
        <p class="card-text">
            Status: <?= $status; ?>
        </p>
        <p class="card-text">
            Preço: R$ <?= $preco; ?>
        </p>
        <p class="card-text">
            GOM: <?= $gom; ?>
        </p>
        <p class="card-text">
            CEG: <?= $ceg; ?>
        </p>
        <p class="card-text">
            Conjunto: <?= $conjunto; ?>
        </p>
    </div>
</div>