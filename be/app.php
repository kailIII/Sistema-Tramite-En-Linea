<?php
    error_reporting(E_ALL); 
    ini_set('display_errors', 1);
    session_start();

    use Stel\BackEnd\FrontController;

	require("FrontController.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>SNR - Sistema de Tramites en Linea</title>
        <link rel="stylesheet" type="text/css" href="styles/structure.css" />
        <link rel="stylesheet" type="text/css" href="styles/generals.css" />
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="styles/jquery-ui.min.css" />
        <script src="scripts/jquery.js"></script>
        <script src="scripts/jquery-ui.min.js"></script>
        <script src="scripts/jquery.confirm.js"></script>
        <script src="scripts/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="content">
            <div id="header" class="clearfix">
                <img src="images/home.jpg">
                <div id="user-nav" class="right">
                    <ul class="left">
                        <li class="left"><?php echo (new DateTime())->format('d/m/Y'); ?></li>
                        <li class="left"><?php 
                            if(isset($_SESSION['nombreDireccion'])){
                                echo " - " . $_SESSION['nombreDireccion']; 
                            }
                            ?>
                        </li>
                    </ul>
                    <ul class="right">
                        <?php
                            if(isset($_SESSION['user'])){
                        ?>
                        <li class="right"><a class="azul" href="./logout">Salir</a></li>
                        <?php }else{ ?>
                        <li class="right"><a class="azul" href="./login">Entrar</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div id="main">
                <?php 
                    FrontController::init();
                ?>
            </div>
            <div id="footer"><a href="http://www.snr.gov.ar">SNR - www.snr.gov.ar<a></div>
        </div>
    </body>
</html>
