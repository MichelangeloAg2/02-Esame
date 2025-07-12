<?php
// Carico il file JSON
$file = __DIR__ . '/privacypolicy.json';
$dati = json_decode(file_get_contents($file), true);

// Controllo caricamento
if (!$dati) {
    die('Errore nella lettura del file JSON');
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="<?php echo htmlspecialchars($dati['head']['charset']); ?>">
    <meta name="viewport" content="<?php echo htmlspecialchars($dati['head']['viewport']); ?>">
    <title><?php echo htmlspecialchars($dati['head']['titolo']); ?></title>
    <link rel="icon" href="<?php echo htmlspecialchars($dati['head']['favicon']); ?>">

    <!-- CSS -->
    <?php foreach ($dati['head']['css'] as $css) : ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($css); ?>">
    <?php endforeach; ?>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo htmlspecialchars($dati['head']['fontawesome']); ?>">

    <style>
        p {
            text-align: justify;
        }

        main {
            padding: 70px 10px 10px 10px;
        }
    </style>
</head>

<body>

    <!-- MENU -->
    <?php include('menu.php'); ?>

    <main>
        <h2><?php echo htmlspecialchars($dati['title']); ?></h2>

        <?php foreach ($dati['sections'] as $section): ?>
            <h3><?php echo htmlspecialchars($section['title']); ?></h3>

            <?php
            if (isset($section['content'])) {
                if (is_array($section['content'])) {
                    foreach ($section['content'] as $paragraph) {
                        echo '<p>' . nl2br(htmlspecialchars($paragraph)) . '</p>';
                    }
                } else {
                    echo '<p>' . nl2br(htmlspecialchars($section['content'])) . '</p>';
                }
            }
            ?>
        <?php endforeach; ?>
    </main>

    <!-- FOOTER -->
    <?php include('footer.php'); ?>

</body>

</html>