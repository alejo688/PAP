<?php

    session_start();
    error_reporting(-1);

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);

    include 'request/menu.php';

	include "views/page/header.php";
	
    if(isset($_SESSION['log_user'])){
        include "views/page/menu.php";
?>
<script>
    jQuery(document).ready(function($) {
        $('.userName').html("<?= ucfirst($_SESSION['correo']) ?>");
    });
</script>
<?php
    }

    if(isset($_GET['op'])){
        $op = $_GET['op'];
    }else{
        $op = "";
    }

	$menu_admin = new menu($op);
	$menu_admin->menu_admin();

	include "views/page/footer.php";
?>