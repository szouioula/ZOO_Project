<?php 
ob_start(); 
?>

Présentation des animaux du zoo

<?php
$content = ob_get_clean();
$titre = "Animaux";
require "template.php";
?>