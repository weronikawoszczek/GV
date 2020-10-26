<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "you@yourdomain.com";
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
        !isset($_POST['email']) ||

        )
    {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $tytul = $_POST['tytul']; // required
    $gatunek = $_POST['gatunek']; // required
    $platform = implode(', ', $_POST['platform']);
    $premiera = $_POST['premiera'];
    $etap = $_POST['etap'];
    $etap = $_POST['opis'];
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

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

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
    $email_message .= "Platforma: " . clean_string($platfrom) . "\n";
    $email_message .= "Planowana data premiery: " . clean_string($premiera) . "\n";
    $email_message .= "Etap prac: " . clean_string($etap) . "\n";
    $email_message .= "Krótki opis fabuły i mechaniki: " . clean_string($opis) . "\n";
    $email_message .= "Jak zarekomendowałbyś swoją produkcję? " . clean_string($rekomendacja) . "\n";
    $email_message .= "Główne cechy gry (USP) " . clean_string($cechy) . "\n";
    $email_message .= "Przewidywany budżet: " . clean_string($budzet) . "\n";
    $email_message .= "Skąd jesteś? " . clean_string($miejsce) . "\n";
    $email_message .= "Osoba kontaktowa: " . clean_string($osoba) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Thank you for contacting us. We will be in touch with you very soon.

<?php
}
?>
