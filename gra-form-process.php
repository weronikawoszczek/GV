<link rel="stylesheet" href="./dist/assets/css/main.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<body style="display: flex; justify-content: center; align-items: center; flex-direction: column; color: #2a2937; height: 100vh; font-size: 1.7rem; padding: 15px; text-align: center;">

<?php
if (isset($_POST['email'])) {
    $email_to = "biuro@gamingventures.pl";
#    $email_to = "woszczekwerka@gmail.com";
    $email_subject = "Zgłoszenie gry";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['tytul']) ||
        !(isset($_POST['platform']) && is_array($_POST['platform']) && count($_POST['platform']) > 0) ||
        !isset($_POST['premiera']) ||
        !isset($_POST['etap']) ||
        !isset($_POST['opis']) ||
        !isset($_POST['rekomendacja']) ||
        !isset($_POST['cechy']) ||
        !isset($_POST['budzet']) ||
        !isset($_POST['miejsce']) ||
        !isset($_POST['osoba']) ||
        !isset($_POST['email'])
        )
    {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['platform'];

    $platforms = array();
    foreach($name as $platform)
    {array_push($platforms,$platform);}
    
    $string_platforms = implode(", ", $platforms);
        
    $tytul = $_POST['tytul'];
    $gatunek = $_POST['gatunek'];
    $premiera = $_POST['premiera'];
    $etap = $_POST['etap'];
    $opis = $_POST['opis'];
    $rekomendacja = $_POST['rekomendacja'];
    $cechy = $_POST['cechy'];
    $budzet = $_POST['budzet'];
    $miejsce = $_POST['miejsce'];
    $osoba = $_POST['osoba'];
    $email = $_POST['email'];


    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";


    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Tytuł: " . clean_string($tytul) . "\n";
    $email_message .= "Gatunek: " . clean_string($gatunek) . "\n";
    $email_message .= "Platforma: " . clean_string($string_platforms) . "\n";
    $email_message .= "Planowana data premiery: " . clean_string($premiera) . "\n";
    $email_message .= "Etap prac: " . clean_string($etap) . "\n";
    $email_message .= "Krótki opis fabuły i mechaniki: " . clean_string($opis) . "\n";
    $email_message .= "Jak zarekomendowałbyś swoją produkcję: " . clean_string($rekomendacja) . "\n";
    $email_message .= "Główne cechy gry (USP): " . clean_string($cechy) . "\n";
    $email_message .= "Przewidywany budżet: " . clean_string($budzet) . "\n";
    $email_message .= "Skąd jesteś: " . clean_string($miejsce) . "\n";
    $email_message .= "Osoba kontaktowa: " . clean_string($osoba) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
    mail($email_to, $email_subject, $email_message);
?>

    
    <p>Thank you for contacting us. We will be in touch with you very soon.</p>

<?php
}
?>

<a href="index.html" class="back-class">Go back</a>

</body>

