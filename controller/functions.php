<?php
    session_start();
    function authenticate()
    {
        if (!isset($_SESSION['idUsuario'])) {
            header("Location: http://localhost/cegs/view/login.php");
        }
    }
?>