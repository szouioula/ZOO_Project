
<?php
//commentaire
$dsn = 'mysql:dbname=zoo_animal;host=localhost:8889';
$user = 'root';
$password = '';
$option = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
try {
    $pdo = new PDO($dsn, $user, $password, $option);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
