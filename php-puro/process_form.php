<?php
session_start();

// Pulisce eventuali dati precedenti
unset($_SESSION['errors'], $_SESSION['old']);

// Recupera dati da POST
$motivo = $_POST['motivo'] ?? '';
$nome = trim($_POST['nome'] ?? '');
$cognome = trim($_POST['cognome'] ?? '');
$email = trim($_POST['email'] ?? '');
$privacy = $_POST['privacy'] ?? '';
$dettagli = trim($_POST['dettagli'] ?? '');

// Validazione
$errors = [];

// Campi obbligatori
if (empty($nome)) $errors['nome'] = "Il campo Nome è obbligatorio.";
if (empty($cognome)) $errors['cognome'] = "Il campo Cognome è obbligatorio.";
if (empty($email)) {
    $errors['email'] = "Il campo Email è obbligatorio.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email non valida.";
}
if ($privacy !== "Acconsento") {
    $errors['privacy'] = "Devi acconsentire al trattamento dei dati.";
}

// Se ci sono errori, salva dati e messaggi in sessione e torna al form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = [
        'motivo' => $motivo,
        'nome' => $nome,
        'cognome' => $cognome,
        'email' => $email,
        'privacy' => $privacy,
        'dettagli' => $dettagli
    ];
    header("Location: contatti.php");
    exit;
}

// Scrive dati nel file
$percorso_file = __DIR__ . '/dati/contatti.txt';
$riga = date("Y-m-d H:i:s") . "\t$motivo\t$nome\t$cognome\t$email\t$privacy\t" . str_replace(["\r", "\n"], [' ', ' '], $dettagli) . "\n";

$result = file_put_contents($percorso_file, $riga, FILE_APPEND | LOCK_EX);
if ($result === false) {
    die("Errore: non riesco a scrivere nel file!");
}

// Messaggio di conferma temporaneo tramite sessione
$_SESSION['success'] = "Il tuo messaggio è stato ricevuto! A breve, arriverà il messaggio di conferma dell'appuntamento. Grazie :) !";
header("Location: contatti.php");
exit;
