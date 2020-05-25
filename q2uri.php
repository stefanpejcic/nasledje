<?php
//Options +FollowSymlinks
//RewriteEngine on
//RewriteRule ^(.*)\.htm$ /q2uri.php?search=$1 [NC]
//
//Then usage should be:
//zagreb.htm will be rewrited to:
//index.php?search=pirot
$_SERVER['PATH_INFO']   = '/';
$_SERVER['REQUEST_URI'] = '/index.php?search='.$_GET['search'];
$_SERVER['SCRIPT_NAME'] = '/index.php';
 
/*
|---------------------------------------------------------------
| PHP SCRIPT EXECUTION TIME ('0' means Unlimited)
|---------------------------------------------------------------
|
*/
set_time_limit(0);

require_once('index.php');
 
/* End of file test.php */

?>
