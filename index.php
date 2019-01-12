<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Système d'auto-complétion</title>
    </head>
    <body>
        <!-- La fonction onkeyup permet de lancer l'intruction au relachement de la touche.
            L'argument this.value pointe sur input et permet de récupérer sa valeur -->
        Pseudo du membre: <input type="text" onkeyup="membres(this.value)" />
        <h1>Liste des membres correspondant à votre recherche</h1>
        <!-- paragraphe qui va permettre d'afficher les profils correspondant à la recherche.
             le javascript va selectionner cet id pour ajouter des enfants au paragraphe-->
        <p id="membres"></p>
        <script src="membres.js"></script>
    </body>
</html>