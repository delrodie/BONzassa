<?php
  /* Si le formulaire est envoyé alors on fait les traitements */
if (isset($_POST['Envoyer']))
{
    /* Récupération des valeurs des champs du formulaire */
    if (get_magic_quotes_gpc())
    {
      $nom   = stripslashes(trim($_POST['nzassaNom']));
      $objet        = stripslashes(trim($_POST['nzassaObjet']));
      $email = stripslashes(trim($_POST['nzassaEmail']));
      $contact    = stripslashes(trim($_POST['nzassaTelephone']));
      $message    = stripslashes(trim($_POST['nzassaMessage']));
      $entreprise    = stripslashes(trim($_POST['nzassaRaisonSociale']));
    }
    else
    {
      $nom   = trim($_POST['nzassaNom']);
      $objet        = trim($_POST['nzassaObjet']);
      $email = trim($_POST['nzassaEmail']);
      $contact    = trim($_POST['nzassaTelephone']);
      $message    = trim($_POST['nzassaMessage']);
      $entreprise    = trim($_POST['nzassaRaisonSociale']);
    }
 
    /* Expression régulière permettant de vérifier si le 
    * format d'une adresse e-mail est correct */
    $regex_mail = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i';
 
    /* Expression régulière permettant de vérifier qu'aucun 
    * en-tête n'est inséré dans nos champs */
    $regex_head = '/[\n\r]/';
 
    /* Si le formulaire n'est pas posté de notre site on renvoie 
    * vers la page d'accueil http://localhost/www.arfis-ci.com/fr/*/ 
    switch ($_SERVER['HTTP_REFERER']) {
      case 'http://www.reseau-nzassa.org/':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break;

      case 'http://www.reseau-nzassa.org/nzassa.php':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break; 
      
      case 'http://www.reseau-nzassa.org/marche.php':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break;

      case 'http://www.reseau-nzassa.org/soutien.php':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break;

      case 'http://www.reseau-nzassa.org/credit.php':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break;

      case 'http://www.reseau-nzassa.org/contact.php':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break;

      case 'http://www.reseau-nzassa.org/index.php':
        $lien = 'http://www.reseau-nzassa.org/contact.php';
        break;

      default:
        $lien = false;
        break;
    }
    if($lien != 'http://www.reseau-nzassa.org/contact.php')
    {
      header('Location: http://www.reseau-nzassa.org/contact.php');
      //echo $lien;
    }
    /* On vérifie que tous les champs sont remplis */
    elseif (empty($nom) 
           || empty($objet) 
           || empty($email) 
           || empty($contact) 
           || empty($message))
    {
      //$alert = 'Tous les champs doivent être renseignés';
      echo "<script type=\"text/javascript\"> alert('Tous les champs doivent etre renseignes');
      window.location='contact.php'; </script>";
    }
    /* On vérifie que le format de l'e-mail est correct */
    elseif (!preg_match($regex_mail, $email))
    {
      $alert = 'L\'adresse '.$email.' n\'est pas valide';
      echo "<script type=\"text/javascript\"> alert('L\'adresse email $email n\'est pas valide');
      window.location='contact.php'; </script>";
    }
    /* On vérifie qu'il n'y a aucun header dans les champs 
    elseif (preg_match($regex_head, $email) 
            || preg_match($regex_head, $nom) 
            || preg_match($regex_head, $message))
    {
        $alert = 'En-têtes interdites dans les champs du formulaire';
        echo $alert;
    }*/
    /* Si aucun problème et aucun cookie créé, on construit le message et on envoie l'e-mail */
    elseif (!isset($_COOKIE['sent']))
    {
        /* Destinataire (votre adresse e-mail) */
        $destinataire = 'info@reseau-nzassa.org';
        //$destinataire = 'delrodieamoikon@gmail.com';
 
        /* Construction du message */
        /*$msg  = 'Bonjour,'."\r\n\r\n";
        $msg .= 'Ce mail a été envoyé depuis monsite.com par '.$civilite.' '.$nom."\r\n\r\n";
        $msg .= 'Voici le message qui vous est adressé :'."\r\n";
        $msg .= '***************************'."\r\n";
        $msg .= $message."\r\n";
        $msg .= '***************************'."\r\n";*/
        $codehtml=
    '<!DOCTYPE>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <table style="background-image: url(http://www.reseau-nzassa.org/ressources/images/bg.jpg); width: 100%; border-radius: 25px 25px 0 0;">
    
    <thead>
      <tr>
        <th style="font-weight: bold; color: white; text-align: center; font-size: 2.5em; padding-top: 30px">
          
          MESSAGE INTERNAUTE
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="width: 100%; padding-left: 10%; padding-right: 10%; padding-top: 25px;">
          <table style="padding: 50px 45px; width: 100%; background: #fff;">
            
            <tbody>
              <tr>
                <td>
                  <table style="background: #fff; ">
                    <tbody>
                      <tr style="text-align: left;">
                        <th style="font-size: 1.75em">Nom et prenoms</th>
                      </tr>
                      <tr>
                        <td style="font-size: 1.5em; padding-left: 45px;">
                          '.strtoupper($nom).'
                        </td>
                      </tr>
                      <tr style="text-align: left;">
                        <th style="font-size: 1.75em; padding-top: 25px;">Raison sociale</th>
                      </tr>
                      <tr>
                        <td style="font-size: 1.5em; padding-left: 45px;">
                          '.strtoupper($entreprise).'
                        </td>
                      </tr>
                      <tr style="text-align: left;">
                        <th style="font-size: 1.75em; padding-top: 25px;">Email</th>
                      </tr>
                      <tr>
                        <td style="font-size: 1.5em; padding-left: 45px;">
                          '.$email.'
                        </td>
                      </tr>
                      <tr style="text-align: left;">
                        <th style="font-size: 1.75em; padding-top: 25px;">Telephone</th>
                      </tr>
                      <tr>
                        <td style="font-size: 1.5em; padding-left: 45px;">
                          '.$contact.'
                        </td>
                      </tr>
                      <tr style="text-align: left;">
                        <th style="font-size: 1.75em; padding-top: 25px;">Objet</th>
                      </tr>
                      <tr>
                        <td style="font-size: 1.5em; padding-left: 45px;">
                          '.$objet.'
                        </td>
                      </tr>
                      <tr style="text-align: left;">
                        <th style="font-size: 1.75em; padding-top: 25px;">Message</th>
                      </tr>
                      <tr>
                        <td style="font-size: 1.5em; padding-left: 45px;">
                          '.$message.'
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td style="padding-bottom: 75px">.</td>
      </tr>
    </tfoot>
  </table>
</body>
</html>';
 
        /* En-têtes de l'e-mail */
        $headers = strtoupper($nom).' <'.$email.'>';
 
        /* Envoi de l'e-mail */
        //if (mail($destinataire, $destinataire, $codehtml, $headers))
        if (mail($destinataire,
     'MESSAGE INTERNAUTE',
     $codehtml,
     "From: $headers\r\n".
        "Reply-To: $email\r\n".
        "Cc: oliviavandenbogaert@gmail.com\r\n".
        "Bcc: delrodieamoikon@gmail.com\r\n".
        "Disposition-Notification-To: delrodieamoikon@gmail.com\r\n".
        "Content-Type: text/html; charset=\"UTF-8\"\r\n"))
        {
            $alert = 'E-mail envoyé avec succès';
            echo "<script type=\"text/javascript\"> alert('E-mail envoye avec succes');
      window.location='index.php'; </script>";
 
            /* On créé un cookie de courte durée (ici 120 secondes) pour éviter de 
            * renvoyer un mail en rafraichissant la page */
            setcookie("sent", "1", time() + 120);
 
            /* On détruit la variable $_POST */
            unset($_POST);
        }
        else
        {
            $alert = 'Erreur d\'envoi de l\'e-mail';
            echo "<script type=\"text/javascript\"> alert('Erreur d\'envoi de l\'e-mail');
      window.location='contact.php'; </script>";
        }
 
    }
    /* Cas où le cookie est créé et que la page est rafraichie, on détruit la variable $_POST */
    else
    {
        unset($_POST);
    }
}
?>

