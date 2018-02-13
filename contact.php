<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Contact Hackers Poulette</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <section class="logo">
      <img src="logo.png" alt="logo Hackers Poulette"/>
    </section>
      <div id="contact">
        <h1> CONTACTEZ NOTRE SUPPORT TECHNIQUE </h1>
        <h2> Contactez-nous à tout moment <br>
          et nous vous répondrons le plus rapidement possible.</h2>
      </div>
      <form action="reponse2.php" method="post">
        <fieldset>
          <legend> Envoyer un message au service technique </legend>
            <section class="info">
              <label for "genre"> GENRE*:</label>
                <input type="radio" name="gender" value="Madame">Femme
                <input type="radio" name="gender" value="Mademoiselle">Homme <br/>
              <div class="nom">
                <label for"nom"> NOM*: </label> <input type="text" name="lastname" required/> <br/>
              </div>
              <div class="prenom">
                <label for"prenom"> PRENOM*: </label> <input type="text" name="firstname" required/> <br/>
              </div>
              <div class="pays">
                <label for "pays"> PAYS* </label> <input type="text" name= "country" vrequired/> <br/>
              </div>
              <div class="email">
                <label for "adresse email"> EMAIL*: </label> <input type="email" name="email" required/> <br/>
              </div>
              <!-- Vérification antispam honeypot -->
              <input id="test_email" name="email" size="30" type="text" value="test_email"/>
            </section>
            <section class="text">
              <div id="sujet">
              <label for "sujet"> Sujet*: </label>
                <select name="sujet" size="1" name="subject">
                  <option> Info produit </option>
                  <option> Problème de montage </option>
                  <option> Activation garantie </option>
                  <option> La carte de fonctionne pas </option>
                  <option> Autre (Veuillez préciser dans votre message) </option> <br/>
                </div>
                </select>
                <br><label for="message"> Message*:</label> <br/>
                  <textarea placeholder="Votre message" rows="18" cols="80" name="mainmessage"> </textarea> <br/>
                    <input type="submit" name="submit" value="Envoyer" class="submit"/>
                    <p> * Les champs suivis d'un astérisque sont obligatoires</p>
            </section>
          </fieldset>
        </form>

          <?php
          //sanitisation
          $options=array(
            "gender" => FILTER_SANITIZE_STRING,
            "lastname" => FILTER_SANITIZE_STRING,
            "firstname" => FILTER_SANITIZE_STRING,
            "country" => FILTER_SANITIZE_STRING,
            "email" => FILTER_SANITIZE_EMAIL,
            "subject" => FILTER_SANITIZE_STRING,
            "mainmessage" => FILTER_SANITIZE_STRING);
          )
          $result=filter_input_array(INPUT_POST, $options);
            if($result!=null AND $result !=FALSE){
              echo "Tous les champs ont été nettoyés!";
            }
            else{
              echo "Un champ est vide ou n'est pas correct!";
            }

            $destinataire="sarahklewiec@gmail.com";
            $form_action="contact.php";
            // Message de confirmation du mail
            $message_non_envoye="L'envoi du message a échoué, veuillez réessayer SVP.";
            // Message d'erreur du formulaire
            $message_formulaire_invalide ="Veuillez vérifier vos coordonnées SVP.";
            // Formulaire envoyé, récupération des champs
            $genre=(isset ($_POST["gender"])) ? Rec($_POST["gender"]): "";
            $nom=(isset ($_POST["lastname"])) ? Rec($_POST["lastname"]): "";
            $prenom=(isset ($_POST["firstname"])) ? Rec($_POST["firstname"]) : "";
            $pays=(isset ($_POST["country"])) ? Rec($_POST["country"]) : "";
            $email=(isset ($_POST["email"])) ? Rec($_POST["email"]) : "";
            $sujet=(isset ($_POST["subject"])) ? Rec($_POST["subject"]) : "";
            $message=(isset ($_POST["mainmessage"])) ? Rec($_POST["mainmessage"]) : "";

            //print_r($genre, $nom, $renom, $pays, $email, $sujet, $message);

              if (isset($_POST["envoi"])) {
                if(($nom !="")&&($email !="") && ($sujet !="")){
                  // variables remplies, envoi EMAIL
                  $headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
				              // envoyer une copie au visiteur ?
		                    if ($copie == 'oui'){
			                    $cible = $destinataire.';'.$email;
                            echo "Merci. Votre message a bien été envoyé";
		                    }
		                    else{
			                    $cible = $destinataire;
                            echo "Merci. Votre message a bien été envoyé";
		                    };
                }
              }
            //envoi du mail


          ?>
          <footer>
            Copyright © 2018 L&S Developement. All rights reserved.
          </footer>
  </body>
</html>
