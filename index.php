<script src="./js/jquery.min.js"></script>
<?php

require('helpers.php');

require('header.php');
require('footer.php');
require('./clase/Usuario.php');
require('base.php');

if(empty($_GET['url']))
    $_GET['url']='Login.asp';



controller($_GET['url']);


?>


