
    // Fonction pour mettre à jour l'année dans le footer
    function updateYear() {
        var currentYear = new Date().getFullYear();
        document.getElementById("currentYear").innerText = currentYear;
    }

    // Appeler la fonction pour la première fois
    updateYear();

    // Mise à jour de l'année chaque nouvelle année
    setInterval(function() {
        updateYear();
    }, 1000 * 60 * 60 * 24); // Vérification toutes les 24 heures pour éviter une utilisation excessive des ressources
