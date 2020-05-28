<?php
$_SERVER['PATH_INFO']   = '/';
$_SERVER['REQUEST_URI'] = '/index.php?search='.$_GET['search'];
$_SERVER['SCRIPT_NAME'] = '/index.php';

set_time_limit(0);

require_once('index.php');

?>
