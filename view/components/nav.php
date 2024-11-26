<div class="row">
    <nav id="barraNav" class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
            <button id="botaoNavBar" class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#barraNavConteudo" aria-controls="barraNavConteudo" aria-expanded="false"
                aria-label="Esse botão esconde a navegação">
                <span><i class="bi bi-list"></i></span>
            </button>
            <div class="navbar-collapse ms-auto collapse" id="barraNavConteudo">
                <div class="m-auto">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
<?php
    if(!isset($_SESSION['tipoUsuario'])){
?>
                        <li class="nav-item">
                            <div class="btnNav">
                                <a href="about.php">Sobre a Hallyul</a>
                            </div>
                        </li>
<?php
    }else if((isset($_SESSION)) && (($_SESSION['tipoUsuario'] == 'GOM') || ($_SESSION['tipoUsuario'] == 'Collector') || ($_SESSION['tipoUsuario'] == 'GOMllector'))){
?>
                        <li class="nav-item">
                            <div class="btnNav">
                                <a href="index.php">Página inicial</a>
                            </div>
                        </li>
<?php
    }
    
    if ((isset($_SESSION)) && (($_SESSION['tipoUsuario'] == 'GOM') || ($_SESSION['tipoUsuario'] == 'GOMllector'))){
?>

<?php
    }else if ((isset($_SESSION)) && ($_SESSION['tipoUsuario'] == 'Collector')){
?>
                        
<?php
    }
    if(isset($_SESSION['tipoUsuario'])){
?>
                        <li class="nav-item">
                            <div class="btnNav">
                               <a href="../controller/logout.php">Log out</a>
                            </div>
                        </li>
<?php
    }
?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>