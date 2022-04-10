<?php 
ob_start(); 
?>

Listes des soignants

<?php
$content = ob_get_clean();
$titre = "Soignants";
require "template.php";
?>