<?php
/*
 *  Configurer tous ici
 */

// Adresse email que le client va entrer.
$from = 'Email <demo@domain.com>';

// une adresse e-mail qui recevra l'e-mail avec la sortie du formulaire
$sendTo = 'Votre Email <votre-email@domain.com>';

// Sujet de l'email
$subject = 'Nouveau message de contact';

// noms de champs de formulaire et leurs traductions.
// array variable name => Texte à apparaître dans l'e-mail
$fields = array('name' => 'Nom', 'surname' => 'Prenom', 'need' => 'Besoin', 'email' => 'Email', 'message' => 'Message'); 

// message qui s'affichera lorsque tout ira bien :)
$okMessage = 'Formulaire de contact envoyé avec succès. Merci, je vous répondrai bientôt!';

// Si quelque chose ne va pas, nous afficherons ce message.
$errorMessage = 'Une erreur est produite lors de la soumission du formulaire. Veuillez réessayer plus tard';

/*
 *  EN ENVOIE!
 */

// si vous ne déboguez pas, désactivez-le en rendant off error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Le formulaire est vide');
            
    $emailText = "Vous avez un nouveau message de votre formulaire de contact\n=============================\n";

    foreach ($_POST as $key => $value) {
        // Si le champ existe dans le tableau $ fields, incluez-le dans l'e-mail 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // Tous les en-têtes nécessaires pour l'e-mail.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'De: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    // Envoie email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// si demandé par la requête AJAX, renvoie la réponse JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// sinon affichez simplement le message
else {
    echo $responseArray['message'];
}
