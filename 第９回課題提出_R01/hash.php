<?php
//hash
$lpw = $_GET["lpw"];
$pw = password_hash($lpw,PASSWORD_DEFAULT);
echo $pw;

?>
