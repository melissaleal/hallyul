<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/cegs/view/login.php");
?>