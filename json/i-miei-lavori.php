<?php
// Caricamento del file JSON
$string = file_get_contents("imieilavori.json");
$dati = json_decode($string, true);

// Recupero categoria da query string (es. ?categoria=css)
$categoriaFiltro = isset($_GET['categoria']) ? strtolower($_GET['categoria']) : null;
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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?php echo $dati['head']['fontawesome']; ?>">
</head>

<body>

    <!-- HEADER / MENU -->
    <?php include('menu.php'); ?>

    <!-- MAIN -->
    <main>
        <?php
        foreach ($dati['main']['works'] as $key => $categoria) {
            if ($categoriaFiltro && strtolower($key) !== $categoriaFiltro) {
                continue;
            }
        ?>
            <h1 style="text-align: center; margin-top: 15px;"><u><?php echo $categoria['titolo']; ?></u></h1>
            <br>
            <div class="<?php echo $categoria['classe']; ?>">
                <?php foreach ($categoria['lavori'] as $lavoro) { ?>
                    <div id="<?php echo $lavoro['id']; ?>">
                        <p class="name"><u><?php echo $lavoro['nome']; ?></u></p>
                        <img src="<?php echo $lavoro['immagine']['src']; ?>" alt="<?php echo $lavoro['immagine']['alt']; ?>">
                        <br>
                        <a class="apri"
                            href="work.php?id=<?php echo $lavoro['id']; ?>"
                            title="Apri dettagli per <?php echo $lavoro['nome']; ?>">
                            Apri
                        </a>
                        <br>
                    </div>
                <?php } ?>
            </div>
            <br>
        <?php } ?>

        <?php if ($categoriaFiltro && !array_key_exists($categoriaFiltro, $dati['main']['works'])): ?>
            <p style="text-align:center; color:red;">Categoria "<?php echo htmlspecialchars($categoriaFiltro); ?>" non trovata.</p>
        <?php endif; ?>
    </main>

    <!-- FOOTER -->
    <?php include('footer.php'); ?>

</body>

</html>