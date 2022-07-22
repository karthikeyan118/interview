<?php
session_start();
include_once('../classes/delete.class.php');
//delete operations
$del = new Delete();
$del->del();

?>