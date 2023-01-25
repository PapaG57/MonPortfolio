<?php
/*
THIS FILE USES PHPMAILER INSTEAD OF THE PHP MAIL() FUNCTION
*/

require 'PHPMailer-master/PHPMailerAutoload.php';

/*
*  Configurer tous ici
*/

// Adresse email que le client va entrer.
$fromEmail = 'demo@domain.com';
$fromName = 'Demo contact form';

// une adresse e-mail qui recevra l'e-mail avec la sortie du formulaire
$sendToEmail = 'demo@domain.com';
$sendToName = 'Demo contact form';

// Sujet de l'email
$subject = 'Nouveau message de contact';

// noms de champs de formulaire et leurs traductions.
// array variable name => Texte à apparaître dans l'e-mail
$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Téléphone', 'email' => 'Email', 'message' => 'Message');

// message that will be displayed when everything is OK :)
$okMessage = 'Formulaire de contact envoyé avec succès. Merci, je vous répondrai bientôt!';

// Si quelque chose ne va pas, nous afficherons ce message.
$errorMessage = 'Une erreur est produite lors de la soumission du formulaire. Veuillez réessayer plus tard';

/*
*  EN ENVOIE!
*/

// si vous ne déboguez pas, désactivez-le en error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{
    
    if(count($_POST) == 0) throw new \Exception('Le formulaire est vide');
    
    $emailTextHtml = "<h1>Vous avez un nouveau message de votre formulaire de contact</h1><hr>";
    $emailTextHtml .= "<table>";
    
    foreach ($_POST as $key => $value) {
        // Si le champ existe dans le tableau $ fields, incluez-le dans l'e-mail
        if (isset($fields[$key])) {
            $emailTextHtml .= "<tr><th>$fields[$key]</th><td>$value</td></tr>";
        }
    }
    $emailTextHtml .= "</table><hr>";
    $emailTextHtml .= "<p>A bientôt,<br>Cordialement,<br>Blueseodesign</p>";
    
    $mail = new PHPMailer;
    
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($sendToEmail, $sendToName); // vous pouvez ajouter plus d'adresses en ajoutant simplement une autre ligne avec $mail->addAddress();
    $mail->addReplyTo($from);
    
    $mail->isHTML(true);
    
    $mail->Subject = $subject;
    $mail->msgHTML($emailTextHtml); // cela créera également une version en texte brut de l'e-mail HTML, très pratique
    
    
    if(!$mail->send()) {
        throw new \Exception('Je ne peux pas envoyer cet e-mail.' . $mail->ErrorInfo);
    }
    
    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    // $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
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