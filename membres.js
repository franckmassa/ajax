// On crée la fonction membres avec comme argument membre
function membres(membre) {
    // Si la longueur de la chaine entrée dans le champs et égal à 0  
    if(membre.length === 0) {
        // On indique que le contenu de mon paragraphe via la propriété innerHtml est vide   
        document.getElementById('membres').innerHTML = '';
        // Si non le visiteur a renseigné au moins un caractère
    } else {
        // On vient instancier un nouvel objet Ajax
        var xhr = new XLMHttpRequest();
        // On appelle la fonction de rappel (callback)
        // A chaque fois que l'objet changera d'état, la fonction anonyme sera appelée
        xhr.onreadystatechange = function() {
            // Au moment ou les données seront récupérées via le script membres.php (== 4)
            // et prêtes à être affichées(== 200), on pourra entrer au sein de la condition
            if (xhr.readyState === 4 && xhr.status === 200) {
                // On va mettre tous le contenu qui est affiché via membres.php au sein de 
                // l'élément paragraphe qui a l'id membre
                document.getElementById('membres').innerHTML = xhr.responseText;
                // la propriété responseText convertit au format Texte la réponse à la 
                // requête AJAX
            }
            // Ne pas oublier de mettre un ; pour fermer la fonction car lors 
            // de la compression du code et du déploiement, le site ne marchera pas 
        }
// On ouvre la requête, on appelle le script membres.php et on transmet le contenu 
// de la recherche du champ. On vient renseigner l'argument membre
        xhr.open('GET', 'membres.php?membre=' + membre);
        // On envoie la requête
        xhr.send();
        // exemple avec la méthode POST 
        // xhr.open('POST', 'membres.php');
        // On envoie la requête
        // xhr.send('membre' + membre);
    }
}
