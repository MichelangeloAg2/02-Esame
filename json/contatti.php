<?php
// Legge il contenuto del file JSON
$json = file_get_contents('contatti.json');
$data = json_decode($json, true);

if ($data === null) {
    // Se la decodifica fallisce
    die('Errore nel caricamento del file JSON');
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="<?= htmlspecialchars($data['head']['charset']) ?>">
    <meta name="viewport" content="<?= htmlspecialchars($data['head']['viewport']) ?>">
    <title><?= htmlspecialchars($data['head']['titolo']) ?></title>
    <link rel="shortcut icon" href="<?= htmlspecialchars($data['head']['favicon']) ?>" type="image/png">

    <?php
    // Link ai CSS
    foreach ($data['head']['css'] as $cssFile) {
        echo '<link rel="stylesheet" href="' . htmlspecialchars($cssFile) . '">' . PHP_EOL;
    }
    ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($data['head']['fontawesome']) ?>">
</head>

<body>

    <!-- Menu -->
    <header>
        <nav class="ham-menu">
            <input id="controll" type="checkbox">
            <label class="label-controll" for="controll">
                <span></span>
            </label>
            <a href="index.php"><img class="logo" src="<?php echo $data['menu']['logo']; ?>" alt="logo"></a>

            <ul id="menu">
                <?php foreach ($data['menu']['voci'] as $voce) { ?>
                    <li class="voci">
                        <a href="<?php echo $voce['link']; ?>"><?php echo $voce['nome']; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <main>
        <h1 style="text-align: center;"><?= htmlspecialchars($data['main']['titolo']) ?></h1><br>

        <?php foreach ($data['main']['sezioni'] as $sezione):
            if ($sezione['tipo'] === 'contatti'): ?>
                <div class="row">
                    <div class="contatti">
                        <div class="map">
                            <img id="mappa" src="<?= htmlspecialchars($sezione['mappa']['src']) ?>"
                                alt="<?= htmlspecialchars($sezione['mappa']['alt']) ?>"
                                width="<?= intval($sezione['mappa']['width']) ?>"
                                height="<?= intval($sezione['mappa']['height']) ?>">
                        </div>
                        <div class="recapiti">
                            <h3 style="text-align: center;"><?= htmlspecialchars($sezione['recapiti']['titolo']) ?></h3>
                            <p style="text-align: center;">
                                <?php foreach ($sezione['recapiti']['dati'] as $dato): ?>
                                    <i class="fa <?= htmlspecialchars($dato['icona']) ?>" style="font-size:24px"></i>
                                    <?= htmlspecialchars($dato['testo']) ?><br>
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div>
                </div><br>
            <?php elseif ($sezione['tipo'] === 'form'): ?>
                <h1 style="text-align: center;"><?= htmlspecialchars($sezione['titolo']) ?></h1><br>
                <div class="container">
                    <p style="text-align: center;"><?= htmlspecialchars($sezione['descrizione']) ?></p>
                    <form action="<?= htmlspecialchars($sezione['action']) ?>" method="<?= htmlspecialchars($sezione['method']) ?>">
                        <?php foreach ($sezione['campi'] as $campo): ?>
                            <?php if ($campo['tipo'] === 'select'): ?>
                                <div class="row">
                                    <div class="col-30">
                                        <label class="contact" for="<?= htmlspecialchars($campo['name']) ?>"><?= htmlspecialchars($campo['label']) ?></label>
                                    </div>
                                    <div class="col-70">
                                        <select id="<?= htmlspecialchars($campo['name']) ?>" name="<?= htmlspecialchars($campo['name']) ?>">
                                            <?php foreach ($campo['opzioni'] as $opzione): ?>
                                                <option value="<?= htmlspecialchars($opzione['value']) ?>"><?= htmlspecialchars($opzione['testo']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php elseif ($campo['tipo'] === 'text'): ?>
                                <div class="row">
                                    <div class="col-30">
                                        <label class="contact" for="<?= htmlspecialchars($campo['name']) ?>"><?= htmlspecialchars($campo['label']) ?></label>
                                    </div>
                                    <div class="col-70">
                                        <input type="text" id="<?= htmlspecialchars($campo['name']) ?>" name="<?= htmlspecialchars($campo['name']) ?>">
                                    </div>
                                </div>
                            <?php elseif ($campo['tipo'] === 'radio-group'): ?>
                                <div class="row">
                                    <fieldset>
                                        <legend>
                                            <?= htmlspecialchars($campo['label']) ?>
                                            <a href="<?= htmlspecialchars($campo['link']['href']) ?>" title="Visita la Privacy Policy">
                                                <?= htmlspecialchars($campo['link']['testo']) ?>
                                            </a>
                                        </legend>
                                        <?php foreach ($campo['opzioni'] as $opzione): ?>
                                            <label>
                                                <input type="radio" name="<?= htmlspecialchars($campo['name']) ?>" value="<?= htmlspecialchars($opzione['value']) ?>">
                                                <?= htmlspecialchars($opzione['testo']) ?>
                                            </label><br>
                                        <?php endforeach; ?>
                                    </fieldset><br>
                                </div>
                            <?php elseif ($campo['tipo'] === 'textarea'): ?>
                                <div class="row">
                                    <div class="col-30">
                                        <label class="contact" for="<?= htmlspecialchars($campo['name']) ?>"><?= htmlspecialchars($campo['label']) ?></label>
                                    </div>
                                    <div class="col-70">
                                        <textarea id="<?= htmlspecialchars($campo['name']) ?>" name="<?= htmlspecialchars($campo['name']) ?>"
                                            rows="<?= intval($campo['rows']) ?>" cols="<?= intval($campo['cols']) ?>"></textarea>
                                    </div>
                                </div>
                            <?php elseif ($campo['tipo'] === 'submit'): ?>
                                <div class="row">
                                    <input type="submit" value="<?= htmlspecialchars($campo['value']) ?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </form>
                </div>
        <?php endif;
        endforeach; ?>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="footer-logo-info">
                <img id="footer-logo" src="<?php echo $data['footer']['logo']; ?>" alt="logo-footer"><br>
                <p>
                    <b>Sede Legale:</b> <?php echo $data['footer']['info']['sede']; ?><br>
                    <b>P.IVA:</b> <?php echo $data['footer']['info']['piva']; ?><br>
                    <b>Telefono:</b> <?php echo $data['footer']['info']['telefono']; ?><br>
                    <b>Email:</b> <?php echo $data['footer']['info']['email']; ?><br>
                    <i class="fa fa-copyright"></i>
                    <?php echo $data['footer']['info']['copyright']; ?>
                </p>
            </div>

            <div class="footer-social">
                <h5>Contattami sui Social!</h5>
                <?php foreach ($data['footer']['social'] as $social) { ?>
                    <i class="fa <?php echo $social['icona']; ?>" style="font-size:24px"></i>
                    <a href="<?php echo $social['link']; ?>" target="_blank" title="<?php echo $social['nome']; ?>">
                        <?php echo $social['nome']; ?>
                    </a><br>
                <?php } ?>

                <h5 style="margin-top: 10px;">Privacy&Cookies Policy</h5>
                <?php foreach ($data['footer']['policy'] as $policy) { ?>
                    <a href="<?php echo $policy['link']; ?>" target="_blank" title="<?php echo $policy['nome']; ?>">
                        <?php echo $policy['nome']; ?>
                    </a><br>
                <?php } ?>
            </div>
        </div>
    </footer>

</body>

</html>