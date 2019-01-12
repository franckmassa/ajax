<?php

// Les identifications qui vont permettre de se connecter la base de données mysql
$dsn = 'mysql:dbname=tuto;host=localhost';
$user = 'root';
$password = '';

// Création de l'objet PDO stocké dans la variable $dbh
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

// Requête préparée pour la sélection des pseudos dans la table membres
$req = $dbh->prepare('SELECT * FROM membres WHERE pseudo LIKE :pseudo');
$req->execute([
    // Le % permet de cibler chaque lettre qui se trouve dans la valeur du paramètre
    'pseudo' => '%' . $_GET['membre'] . '%'
]);

// On crée une variable $membres qui va contenir tous le html qui sera afficher
$membres = "";


// On crée une boucle qui va traité chaque pseudo qui va correspondre à ma recherche
while ($data = $req->fetch()) {
    // Si membre est vide
    if (!$membres) {
        // On met un lien vers une page qui n'existe pas et on vient indiquer l'id et le pseudo
        $membres = '<a href="membre.php?id=' . $data['id'] . '">' . $data['pseudo'] . '</a>';
    } else {
        // Si il y a plus d'une personne qui correspondent,
        //on vient ajouter le membre avec l'opérateur de concaténation
        $membres .= '<br><a href="membre.php?id=' . $data['id'] . '">' . $data['pseudo'] . '</a>';
    }
}

// On fait un echo pour afficher tous les membres qui correspondent à la recherche que
// va récupérer AJAX
echo $membres;
