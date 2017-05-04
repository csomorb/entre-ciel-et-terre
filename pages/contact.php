
<?php
/**
 * This is a PHP library that handles calling reCAPTCHA.
 *    - Documentation and latest version
 *          https://developers.google.com/recaptcha/docs/php
 *    - Get a reCAPTCHA API Key
 *          https://www.google.com/recaptcha/admin/create
 *    - Discussion group
 *          http://groups.google.com/group/recaptcha
 *
 * @copyright Copyright (c) 2014, Google Inc.
 * @link      http://www.google.com/recaptcha
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * A ReCaptchaResponse is returned from checkAnswer().
 */
class ReCaptchaResponse
{
    public $success;
    public $errorCodes;
}
class ReCaptcha
{
    private static $_signupUrl = "https://www.google.com/recaptcha/admin";
    private static $_siteVerifyUrl =
        "https://www.google.com/recaptcha/api/siteverify?";
    private $_secret;
    private static $_version = "php_1.0";
    /**
     * Constructor.
     *
     * @param string $secret shared secret between site and ReCAPTCHA server.
     */
    function ReCaptcha($secret)
    {
        if ($secret == null || $secret == "") {
            die("To use reCAPTCHA you must get an API key from <a href='"
                . self::$_signupUrl . "'>" . self::$_signupUrl . "</a>");
        }
        $this->_secret=$secret;
    }
    /**
     * Encodes the given data into a query string format.
     *
     * @param array $data array of string elements to be encoded.
     *
     * @return string - encoded request.
     */
    private function _encodeQS($data)
    {
        $req = "";
        foreach ($data as $key => $value) {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }
        // Cut the last '&'
        $req=substr($req, 0, strlen($req)-1);
        return $req;
    }
    /**
     * Submits an HTTP GET to a reCAPTCHA server.
     *
     * @param string $path url path to recaptcha server.
     * @param array  $data array of parameters to be sent.
     *
     * @return array response
     */
    private function _submitHTTPGet($path, $data)
    {
        $req = $this->_encodeQS($data);
        $response = file_get_contents($path . $req);
        return $response;
    }
    /**
     * Calls the reCAPTCHA siteverify API to verify whether the user passes
     * CAPTCHA test.
     *
     * @param string $remoteIp   IP address of end user.
     * @param string $response   response string from recaptcha verification.
     *
     * @return ReCaptchaResponse
     */
    public function verifyResponse($remoteIp, $response)
    {
        // Discard empty solution submissions
        if ($response == null || strlen($response) == 0) {
            $recaptchaResponse = new ReCaptchaResponse();
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = 'missing-input';
            return $recaptchaResponse;
        }
        $getResponse = $this->_submitHttpGet(
            self::$_siteVerifyUrl,
            array (
                'secret' => $this->_secret,
                'remoteip' => $remoteIp,
                'v' => self::$_version,
                'response' => $response
            )
        );
        $answers = json_decode($getResponse, true);
        $recaptchaResponse = new ReCaptchaResponse();
        if (trim($answers ['success']) == true) {
            $recaptchaResponse->success = true;
        } else {
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = $answers [error-codes];
        }
        return $recaptchaResponse;
    }
}
$reCaptcha = new ReCaptcha("6LedpxoUAAAAAOcWEd6ICDlvmY_qxnQrlB3XDcjs");
if(isset($_POST["g-recaptcha-response"])) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );
    if ($resp != null && $resp->success) {
        //on traite le formulaire
        if (strlen($_POST['message']) > 1 ) {    
    
     
//$mail = 'entretetc@gmail.com'; // Déclaration de l'adresse de destination.
$mail = 'csomorbarnabas@yahoo.com';
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$message = test_input($_POST['message']);

//=====Déclaration des messages au format texte et au format HTML.
$message_txt = $message .  $passage_ligne  . "Message envoyé depuis le site entre terre et ciel.";
$message_html = "<html><head></head><body><p>".$message."</p><p>Message envoyé depuis le site entre terre et ciel.</p></body></html>";
//==========
 
//=====Création de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Hey mon ami !";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"SiteWeb\"<csomorb@c9users.io>".$passage_ligne;
$header.= "Reply-to: \"SiteWeb\" <csomorb@c9users.io>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;
 
//========== 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
 
//==========
        
        }    
        
    /*    var_dump($_POST);
    echo "CAPTCHA OK";*/
        
    }
}
?>
    <div class="titre-div">
        <div>
            <a href="/accueil">
            <img src="./img/logo.jpg" class="logo" /> 
            </a>
        </div>
        <div class="titre">
            <div>
                <h1 class="title has-text-centered">Entre ciel et terre</h1>
                <h2 class="subtitle has-text-centered" id="ss-titre">Contact</h2>
            </div>
        </div>
    </div>

<div class="marginTop100">
    Si le projet vous intéresse et que vous souhaitez plus d'informations, n'hésitez pas à nous contacter.
</div>
<div class="flex-align-midle marginTop30">
    <div>
        <img src="img/logo_mail.jpg" alt="mail" class="logo-contact"/>
    </div>
    <div>
        <a href="mailto:entretetc@gmail.com">entretetc@gmail.com</a>    
    </div>
</div>
<div class="flex-align-midle">
    <div>
        <img src="img/logo_tel.jpg" alt="tel" class="logo-contact"/>
    </div>
    <div>
        <p>Augustin: <a href="tel:0033641675560">+33 (0)6 41 67 55 60</a><br/>Théophile: <a href="tel:0033651996090">+33 (0)6 51 99 60 90</a></p>  
    </div>
</div>
<div class="flex-align-midle">
    <div>
        <img src="img/logo_fb.png" alt="fb" class="logo-contact"/>
    </div>
    <div>
        <p><a href="http://www.facebook.com/entretetc/" target="_blank">www.facebook.com/entretetc/</a> </p>
    </div>
</div>
<div class="marginTop30">
    Ou envoyez nous directement un message :
</div>
<form action="/contact" method="POST" accept-charset="UTF-8">
<div class="field">
  <label class="label">Message</label>
  <p class="control">
    <textarea class="textarea" placeholder="Votre message" name="message"></textarea>
  </p>
</div>

<div class="field is-grouped">
  <p class="control">
    <button class="button is-info">Envoyer</button>
  </p>
</div>
<div class="g-recaptcha" data-sitekey="6LedpxoUAAAAAIkS9QFqSyn-8R8R_CM2d3wklp9A"></div>
</form>