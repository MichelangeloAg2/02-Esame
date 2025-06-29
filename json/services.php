<?php
// Carico il file JSON
$dati = json_decode(file_get_contents("servizi.json"), true);
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="<?php echo $dati['head']['charset']; ?>">
    <meta name="viewport" content="<?php echo $dati['head']['viewport']; ?>">
    <title><?php echo $dati['head']['titolo']; ?></title>
    <link rel="icon" type="image/png" href="<?php echo $dati['head']['favicon']; ?>">

    <!-- CSS -->
    <?php
    foreach ($dati['head']['css'] as $css) {
        echo '<link rel="stylesheet" href="' . $css . '">' . "\n";
    }
    ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $dati['head']['fontawesome']; ?>">
</head>

<body>

    <!-- MENU -->
    <?php include('menu.php'); ?>

    <!-- MAIN -->
    <main>

        <!-- Servizi di Progettazione Web -->
        <h1><?php echo $dati['main']['servizi']['webDevelopment']['titolo']; ?></h1>
        <div class="<?php echo $dati['main']['servizi']['webDevelopment']['classe']; ?>">
            <?php
            foreach ($dati['main']['servizi']['webDevelopment']['offerte'] as $offerta) {
                echo '<div class="first">';
                echo '<p>' . $offerta['nome'] . '</p>';
                echo '<img src="' . $offerta['immagine']['src'] . '" alt="' . $offerta['immagine']['alt'] . '">';
                echo '<p>';
                echo 'Tipo di Servizio: ' . $offerta['dettagli']['tipo'] . '<br>';
                echo 'Codici: ' . $offerta['dettagli']['codici'] . '<br>';
                echo 'Tempistiche: ' . $offerta['dettagli']['tempistiche'] . '<br>';
                echo 'Costi: ' . $offerta['dettagli']['costi'];
                echo '</p>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Servizi di Web Design -->
        <h1><?php echo $dati['main']['servizi']['webDesign']['titolo']; ?></h1>
        <div class="<?php echo $dati['main']['servizi']['webDesign']['classe']; ?>">
            <?php
            foreach ($dati['main']['servizi']['webDesign']['offerte'] as $offerta) {
                echo '<div class="first">';
                echo '<p>' . $offerta['nome'] . '</p>';
                echo '<img src="' . $offerta['immagine']['src'] . '" alt="' . $offerta['immagine']['alt'] . '">';
                echo '<p>';
                echo 'Tipo di Servizio: ' . $offerta['dettagli']['tipo'] . '<br>';
                echo 'Codici: ' . $offerta['dettagli']['codici'] . '<br>';
                echo 'Tempistiche: ' . $offerta['dettagli']['tempistiche'] . '<br>';
                echo 'Costi: ' . $offerta['dettagli']['costi'];
                echo '</p>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- Call to Action -->
        <h2><?php echo $dati['main']['servizi']['callToAction']['titolo']; ?></h2>
        <p style="text-align:center;">
            <?php echo $dati['main']['servizi']['callToAction']['testo']; ?>
            <a href="<?php echo $dati['main']['servizi']['callToAction']['link']['href']; ?>" title="<?php echo $dati['main']['servizi']['callToAction']['link']['title']; ?>">
                <?php echo $dati['main']['servizi']['callToAction']['link']['title']; ?>
            </a>
        </p>

    </main>

    <!-- FOOTER -->
    <?php include('footer.php') ?>

</body>

</html>