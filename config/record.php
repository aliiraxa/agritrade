<?php

include_once "manage.php";

$m=new Manage();



echo $m->getQTY($_POST['name']);

?>
