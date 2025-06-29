<?php
// Caricamento del file JSON
$string = file_get_contents("imieilavori.json");
$dati = json_decode($string, true);
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

    <!-- HEADER/MENU -->
    <?php include('menu.php'); ?>

    <!-- MAIN -->
    <main>
        <?php foreach ($dati['main']['works'] as $categoria) { ?>
            <h1 style="text-align: center; margin-top: 15px;"><u><?php echo $categoria['titolo']; ?></u></h1>
            <br>
            <div class="<?php echo $categoria['classe']; ?>">
                <?php foreach ($categoria['lavori'] as $lavoro) { ?>
                    <div id="<?php echo $lavoro['id']; ?>">
                        <p class="name"><u><?php echo $lavoro['nome']; ?></u></p>
                        <img src="<?php echo $lavoro['immagine']['src']; ?>" alt="<?php echo $lavoro['immagine']['alt']; ?>">
                        <br>
                        <a class="apri" href="<?php echo $lavoro['link']['href']; ?>" title="<?php echo $lavoro['link']['title']; ?>">Apri</a>
                        <br>
                    </div>
                <?php } ?>
            </div>
            <br>
        <?php } ?>
    </main>

    <!-- FOOTER -->
    <?php include('footer.php') ?>

</body>

</html>