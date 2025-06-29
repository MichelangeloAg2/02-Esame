<?php
// Carico il file JSON
$file = __DIR__ . '/index.json';
$dati = json_decode(file_get_contents($file), true);

// Controllo caricamento
if (!$dati) {
    die('Errore nella lettura del file JSON');
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="<?php echo $dati['head']['charset']; ?>">
    <meta name="viewport" content="<?php echo $dati['head']['viewport']; ?>">
    <title><?php echo $dati['head']['titolo']; ?></title>
    <link rel="icon" href="<?php echo $dati['head']['favicon']; ?>">

    <!-- CSS -->
    <?php foreach ($dati['head']['css'] as $css) : ?>
        <link rel="stylesheet" href="<?php echo $css; ?>">
    <?php endforeach; ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $dati['head']['fontawesome']; ?>">
</head>

<body>

    <!-- MENU -->
    <?php include('menu.php'); ?>

    <!-- MAIN -->
    <main>

        <!-- Header Immagine -->
        <div class="container">
            <img src="<?php echo $dati['main']['header']['immagine']; ?>"
                alt="<?php echo $dati['main']['header']['alt']; ?>"
                class="<?php echo $dati['main']['header']['classe']; ?>">
        </div>

        <!-- Offerte -->
        <section class="offerte">
            <h1 style="text-align: center;">Le mie offerte!</h1>
            <div class="container-offerte">
                <?php foreach ($dati['main']['offerte'] as $offerta) : ?>
                    <div class="<?php echo $offerta['classe']; ?>" style="text-align: center;">
                        <h3>
                            <a href="<?php echo $offerta['link']; ?>" title="Vai al servizio">
                                <?php echo $offerta['titolo']; ?>
                            </a>
                        </h3>
                        <img src="<?php echo $offerta['immagine']; ?>" alt="<?php echo $offerta['alt']; ?>">
                        <p>
                            Comprende:<br>
                            <?php foreach ($offerta['descrizione'] as $descrizione) : ?>
                                <?php echo $descrizione; ?><br>
                            <?php endforeach; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Progetti -->
        <section class="progetti">
            <h1 style="text-align: center;">I miei progetti</h1>
            <div class="container-progetti">
                <?php foreach ($dati['main']['progetti'] as $progetto) : ?>
                    <div class="responsive">
                        <div class="galleria">
                            <a target="_blank" href="<?php echo $progetto['link']; ?>" title="Visita il progetto">
                                <img src="<?php echo $progetto['immagine']; ?>" alt="<?php echo $progetto['alt']; ?>">
                            </a>
                            <div class="descrizione"><?php echo $progetto['titolo']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="cta">
            <h3 style="text-align: center;">
                Vuoi saperne di più? Clicca
                <a href="contatti.php" title="Contattami">QUI</a>
                e compila il form. Fisseremo un appuntamento!
            </h3>
        </section>
    </main>

    <!-- FOOTER -->
    <?php include('footer.php'); ?>

</body>

</html>