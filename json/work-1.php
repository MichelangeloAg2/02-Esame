<?php
// Caricamento JSON
$json = file_get_contents('work-1.json');
$dati = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="<?php echo $dati['head']['charset']; ?>">
    <meta name="viewport" content="<?php echo $dati['head']['viewport']; ?>">
    <title><?php echo $dati['head']['titolo']; ?></title>
    <link rel="icon" href="<?php echo $dati['head']['favicon']; ?>" type="image/png">
    <?php
    foreach ($dati['head']['css'] as $css) {
        echo "<link rel='stylesheet' href='$css'>\n";
    }
    ?>
    <link rel="stylesheet" href="<?php echo $dati['head']['fontawesome']; ?>">
</head>

<body>

    <!-- Menu -->
    <?php include('menu.php') ?>

    <!-- Main -->
    <main>
        <h1 style="text-align: center;"><?php echo $dati['main']['titolo']; ?></h1>

        <?php
        foreach ($dati['main']['sezioni'] as $sezione) {
            if ($sezione['tipo'] === 'presentazione') {
                echo "<div class='presentation-work'>";
                echo "<div id='image-circle'><img src='{$sezione['immagini'][0]['src']}' alt='{$sezione['immagini'][0]['alt']}'></div>";
                echo "<div id='presentation'>";
                echo "<p style='text-align:center;'>Cliente: {$sezione['testo']['cliente']}<br>";
                echo "Periodo: {$sezione['testo']['periodo']}<br>";
                echo "Tipo di Lavoro: {$sezione['testo']['tipo_lavoro']}<br>";
                echo "Link: <a href='{$sezione['testo']['link']['href']}'>{$sezione['testo']['link']['testo']}</a></p>";
                echo "</div>";
                echo "<div id='image-circle2'><img src='{$sezione['immagini'][1]['src']}' alt='{$sezione['immagini'][1]['alt']}'></div>";
                echo "</div>";
            }

            if ($sezione['tipo'] === 'descrizione') {
                echo "<div class='description-work'>";
                echo "<div id='description'>";
                foreach ($sezione['contenuto'] as $blocco) {
                    echo "<h3>{$blocco['titolo']}</h3>";
                    echo "<p>{$blocco['testo']}</p><br>";
                }
                echo "</div>";
                echo "<div id='project-picture'><img src='{$sezione['immagine']['src']}' alt='{$sezione['immagine']['alt']}' width='{$sezione['immagine']['width']}' height='{$sezione['immagine']['height']}'></div>";
                echo "</div>";
            }

            if ($sezione['tipo'] === 'workslist') {
                echo "<div class='workslist' style='text-align:center;'>";
                echo "<div id='list'>";
                echo "<h2>{$sezione['titolo']}</h2>";
                foreach ($sezione['works'] as $work) {
                    echo "<img src='{$work['src']}' alt='{$work['alt']}' width='{$work['width']}' height='{$work['height']}'><br>";
                    echo "{$work['nome']}<br>";
                }
                echo "</div>";
                echo "</div>";
            }

            if ($sezione['tipo'] === 'feedback') {
                echo "<div id='feedback' style='text-align:center;'>";
                echo "<h3>{$sezione['titolo']}</h3>";
                foreach ($sezione['icone'] as $icona) {
                    echo "<i class='fa {$icona['fa']}' style='font-size:{$icona['dimensione']};color:{$icona['colore']};'></i>\n";
                }
                echo "<p>{$sezione['testo']} <a href='{$sezione['link']['href']}'>{$sezione['link']['testo']}</a>.</p>";
                echo "</div>";
            }
        }
        ?>
    </main>

    <!-- Footer -->
    <?php include('footer.php') ?>
</body>

</html>