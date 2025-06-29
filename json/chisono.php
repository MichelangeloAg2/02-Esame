<?php
// Carico il file JSON
$json = file_get_contents('chisono.json');
$dati = json_decode($json, true);

// Controllo se il JSON è stato caricato correttamente
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
    <link rel="stylesheet" href="<?php echo $dati['head']['fontawesome']; ?>">

    <!-- CSS -->
    <?php foreach ($dati['head']['css'] as $css) { ?>
        <link rel="stylesheet" href="<?php echo $css; ?>">
    <?php } ?>

    <style>
        /* Aggiunta classe per rendere le immagini responsive. Messo qui in quanto, facendo dei test, risulta funzionare meglio.*/
        .img-responsive {
            max-width: 100%;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 15px;
        }
    </style>

</head>

<body>

    <!-- Menu -->
    <?php include('menu.php'); ?>
    <main>
        <h1><?php echo $dati['header']['h1']; ?></h1>
        <h2><?php echo $dati['header']['h2']; ?></h2>

        <div class="myself">
            <div id="picmys">
                <img src="<?php echo $dati['sezione_myself']['immagine']['src']; ?>"
                    alt="<?php echo $dati['sezione_myself']['immagine']['alt']; ?>"
                    class="img-responsive">
            </div>
            <div id="infomys">
                <p><?php echo $dati['sezione_myself']['testo']; ?></p>
            </div>
        </div>

        <h1><?php echo $dati['sezione_myskill']['titolo']; ?></h1>
        <h2><?php echo $dati['sezione_myskill']['sottotitolo']; ?></h2>

        <div class="myskill">
            <div id="infoskill">
                <p><?php echo $dati['sezione_myskill']['testo']; ?></p>
            </div>
            <div id="picskill">
                <img src="<?php echo $dati['sezione_myskill']['immagine']['src']; ?>"
                    alt="<?php echo $dati['sezione_myskill']['immagine']['alt']; ?>"
                    class="img-responsive">
            </div>
        </div>

        <h1>
            <?php echo $dati['cta_finale']['testo']; ?>
            <a href="<?php echo $dati['cta_finale']['link']['href']; ?>"
                title="<?php echo $dati['cta_finale']['link']['titolo']; ?>">
                <?php echo $dati['cta_finale']['link']['testo']; ?>
            </a>!
        </h1>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="footer-logo-info">
                <img id="footer-logo" src="<?php echo $dati['footer']['logo']; ?>" alt="logo-footer"><br>
                <p>
                    <b>Sede Legale:</b> <?php echo $dati['footer']['info']['sede']; ?><br>
                    <b>P.IVA:</b> <?php echo $dati['footer']['info']['piva']; ?><br>
                    <b>Telefono:</b> <?php echo $dati['footer']['info']['telefono']; ?><br>
                    <b>Email:</b> <?php echo $dati['footer']['info']['email']; ?><br>
                    <i class="fa fa-copyright"></i>
                    <?php echo $dati['footer']['info']['copyright']; ?>
                </p>
            </div>

            <div class="footer-social">
                <h5>Contattami sui Social!</h5>
                <?php foreach ($dati['footer']['social'] as $social) { ?>
                    <i class="fa <?php echo $social['icona']; ?>" style="font-size:24px"></i>
                    <a href="<?php echo $social['link']; ?>" target="_blank" title="<?php echo $social['nome']; ?>">
                        <?php echo $social['nome']; ?>
                    </a><br>
                <?php } ?>

                <h5 style="margin-top: 10px;">Privacy&Cookies Policy</h5>
                <?php foreach ($dati['footer']['policy'] as $policy) { ?>
                    <a href="<?php echo $policy['link']; ?>" target="_blank" title="<?php echo $policy['nome']; ?>">
                        <?php echo $policy['nome']; ?>
                    </a><br>
                <?php } ?>
            </div>
        </div>
    </footer>

</body>

</html>