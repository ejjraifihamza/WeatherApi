var heuresDiv = document.querySelector('.heures');


var affichageHeure = function(){


                    // Déclaration des variables qui seront utilisées : 
    var today,heures, minutes, secondes, deuxChiffres;


                    // Récupérer la date actuelle : 
    today = new Date();



                    //Afficher les heures, minutes et secondes toujours avec deux chiffres : 
    deuxChiffres = function(element){
        if(element < 10){
            return element = "0" + element;
        } else {
            return element;
        }
    }

                           // Récupérer les heures : 
    heures = deuxChiffres(today.getHours());

                           // Récupérer les minutes : 
    minutes = deuxChiffres(today.getMinutes());

                          // Récupérer les secondes : 
    secondes = deuxChiffres(today.getSeconds());

                          //Affichage dans nos DIV du HTML : 
    heuresDiv.textContent = heures + ":" + minutes + ":" + secondes;


                           // Lancer la fonction affichage heure toutes les 1000 ms, soit toute les secondes : 
    setTimeout(affichageHeure, 1000);
}

                         //Lancer la fonction une fois au début : 
affichageHeure();