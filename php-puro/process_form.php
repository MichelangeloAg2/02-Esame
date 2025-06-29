<!DOCTYPE html>
<html lang="it">

<head>
    <title>Otter's Club-Homepage</title>
    <?php
    include('link.php');
    ?>
    <link rel="stylesheet" href="CSS/main.min.css">
    <link rel="stylesheet" href="CSS/process_form.min.css">
</head>

<body>
    <header>
        <?php
        include('menu.php');
        ?>
    </header>
    <main>
        <div class="process">
            <?php
            // Errori
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // Validazione
            $errors = [];
            $motivo = $_POST['motivo'] ?? '';
            $nome = trim($_POST['nome'] ?? '');
            $cognome = trim($_POST['cognome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $privacy = $_POST['privacy'] ?? '';
            $dettagli = trim($_POST['dettagli'] ?? '');

            // LOG 1: Dati ricevuti (visibili all'utente)
            echo "<h3><strong>Dati ricevuti</strong></h3>";
            echo "<strong>Motivo:</strong> $motivo<br>";
            echo "<strong>Nome:</strong> $nome<br>";
            echo "<strong>Cognome:</strong> $cognome<br>";
            echo "<strong>Email:</strong> $email<br>";
            echo "<strong>Privacy:</strong> $privacy<br>";
            echo "<strong>Dettagli:</strong> $dettagli<br>";

            // Validazione dei dati
            if (empty($nome)) $errors[] = "Il campo Nome è obbligatorio.";
            if (empty($cognome)) $errors[] = "Il campo Cognome è obbligatorio.";
            if (empty($email)) {
                $errors[] = "Il campo Email è obbligatorio.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email non valida.";
            }
            if ($privacy !== "Acconsento") $errors[] = "Devi acconsentire al trattamento dei dati.";

            // LOG 2: Mostra errori, se presenti
            if (!empty($errors)) {
                echo "<h3>Errori trovati:</h3><ul>";
                foreach ($errors as $err) {
                    echo "<li>$err</li>";
                }
                echo "</ul>";
                exit;
            }

            // LOG 3: Percorso file
            $percorso_file = __DIR__ . '/dati/contatti.txt';

            // LOG 4: Preparazione riga
            $riga = date("Y-m-d H:i:s") . "\t$motivo\t$nome\t$cognome\t$email\t$privacy\t" . str_replace(["\r", "\n"], [' ', ' '], $dettagli) . "\n";

            // LOG 5: Scrittura nel file
            $result = file_put_contents($percorso_file, $riga, FILE_APPEND | LOCK_EX);
            if ($result === false) {
                echo "<p style='color:red;'>Errore: non riesco a scrivere nel file!</p>";
                exit;
            } else {
                echo "<p style='color:green;'>Grazie! I tuoi dati sono stati inviati correttamente.</p>";
            }
            ?>
            <img class="thumbup" src="Immagini/mestil.png" alt="meghibli">

            <p>Torna alla <strong><a href="index.php" title="Homepage">HOMEPAGE</a></strong> e continua a scrutare il sito :)</p>
        </div>
    </main>
    <?php
    @include('footer.php');
    ?>
</body>