<?php
session_start();

// Recupero messaggi e valori vecchi
$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? '';
unset($_SESSION['old'], $_SESSION['errors'], $_SESSION['success']);

// Legge il contenuto del file JSON
$json = file_get_contents('contatti.json');
$data = json_decode($json, true);

if ($data === null) {
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

    <?php foreach ($data['head']['css'] as $cssFile): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($cssFile) ?>">
    <?php endforeach; ?>

    <link rel="stylesheet" href="<?= htmlspecialchars($data['head']['fontawesome']) ?>">

    <style>
        .errore {
            color: red;
            font-size: 0.9em;
        }

        .campo-errore input,
        .campo-errore select,
        .campo-errore textarea {
            border: 2px solid red;
        }

        .successo {
            color: green;
            text-align: center;
            font-weight: bold;
            margin-bottom: 1em;
        }
    </style>
</head>

<body>

    <header>
        <nav class="ham-menu">
            <input id="controll" type="checkbox">
            <label class="label-controll" for="controll"><span></span></label>
            <a href="index.php"><img class="logo" src="<?= $data['menu']['logo'] ?>" alt="logo"></a>
            <ul id="menu">
                <?php foreach ($data['menu']['voci'] as $voce): ?>
                    <li class="voci"><a href="<?= $voce['link'] ?>"><?= $voce['nome'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1 style="text-align: center;"><?= htmlspecialchars($data['main']['titolo']) ?></h1><br>

        <?php foreach ($data['main']['sezioni'] as $sezione):
            if ($sezione['tipo'] === 'contatti'): ?>
                <div class="row">
                    <div class="contatti">
                        <div class="map">
                            <img id="mappa" src="<?= $sezione['mappa']['src'] ?>" alt="<?= $sezione['mappa']['alt'] ?>" width="<?= $sezione['mappa']['width'] ?>" height="<?= $sezione['mappa']['height'] ?>">
                        </div>
                        <div class="recapiti">
                            <h3 style="text-align: center;"><?= $sezione['recapiti']['titolo'] ?></h3>
                            <p style="text-align: center;">
                                <?php foreach ($sezione['recapiti']['dati'] as $dato): ?>
                                    <i class="fa <?= $dato['icona'] ?>" style="font-size:24px"></i>
                                    <?= $dato['testo'] ?><br>
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div>
                </div><br>
            <?php elseif ($sezione['tipo'] === 'form'): ?>
                <h1 style="text-align: center;"><?= $sezione['titolo'] ?></h1><br>
                <div class="container">
                    <?php if ($success): ?>
                        <p class="successo"><?= htmlspecialchars($success) ?></p>
                    <?php endif; ?>
                    <p style="text-align: center;"><?= $sezione['descrizione'] ?></p>
                    <form action="<?= $sezione['action'] ?>" method="<?= $sezione['method'] ?>">
                        <?php foreach ($sezione['campi'] as $campo):
                            $name = $campo['name'] ?? '';
                            $value = htmlspecialchars($old[$name] ?? '');
                            $erroreCampo = isset($errors[$name]);
                            $classeErrore = $erroreCampo ? 'campo-errore' : '';
                        ?>
                            <?php if ($campo['tipo'] === 'select'): ?>
                                <div class="row <?= $classeErrore ?>">
                                    <div class="col-30">
                                        <label class="contact" for="<?= $name ?>"><?= $campo['label'] ?></label>
                                    </div>
                                    <div class="col-70">
                                        <select id="<?= $name ?>" name="<?= $name ?>">
                                            <?php foreach ($campo['opzioni'] as $opzione): ?>
                                                <option value="<?= $opzione['value'] ?>" <?= ($value == $opzione['value']) ? 'selected' : '' ?>>
                                                    <?= $opzione['testo'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if ($erroreCampo): ?><div class="errore"><?= $errors[$name] ?></div><?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif ($campo['tipo'] === 'text'): ?>
                                <div class="row <?= $classeErrore ?>">
                                    <div class="col-30">
                                        <label class="contact" for="<?= $name ?>"><?= $campo['label'] ?></label>
                                    </div>
                                    <div class="col-70">
                                        <input type="text" id="<?= $name ?>" name="<?= $name ?>" value="<?= $value ?>">
                                        <?php if ($erroreCampo): ?><div class="errore"><?= $errors[$name] ?></div><?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif ($campo['tipo'] === 'radio-group'): ?>
                                <div class="row <?= $classeErrore ?>">
                                    <fieldset>
                                        <legend>
                                            <?= $campo['label'] ?>
                                            <a href="<?= $campo['link']['href'] ?>" title="Privacy"><?= $campo['link']['testo'] ?></a>
                                        </legend>
                                        <?php foreach ($campo['opzioni'] as $opzione): ?>
                                            <label>
                                                <input type="radio" name="<?= $campo['name'] ?>" value="<?= $opzione['value'] ?>" <?= ($value == $opzione['value']) ? 'checked' : '' ?>>
                                                <?= $opzione['testo'] ?>
                                            </label><br>
                                        <?php endforeach; ?>
                                        <?php if ($erroreCampo): ?><div class="errore"><?= $errors[$name] ?></div><?php endif; ?>
                                    </fieldset><br>
                                </div>
                            <?php elseif ($campo['tipo'] === 'textarea'): ?>
                                <div class="row <?= $classeErrore ?>">
                                    <div class="col-30">
                                        <label class="contact" for="<?= $name ?>"><?= $campo['label'] ?></label>
                                    </div>
                                    <div class="col-70">
                                        <textarea id="<?= $name ?>" name="<?= $name ?>" rows="<?= $campo['rows'] ?>" cols="<?= $campo['cols'] ?>"><?= $value ?></textarea>
                                        <?php if ($erroreCampo): ?><div class="errore"><?= $errors[$name] ?></div><?php endif; ?>
                                    </div>
                                </div>
                            <?php elseif ($campo['tipo'] === 'submit'): ?>
                                <div class="row">
                                    <input type="submit" value="<?= $campo['value'] ?>">
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </form>
                </div>
        <?php endif;
        endforeach; ?>
    </main>

    <footer>
        <div class="footer">
            <div class="footer-logo-info">
                <img id="footer-logo" src="<?= $data['footer']['logo'] ?>" alt="logo-footer"><br>
                <p>
                    <b>Sede Legale:</b> <?= $data['footer']['info']['sede'] ?><br>
                    <b>P.IVA:</b> <?= $data['footer']['info']['piva'] ?><br>
                    <b>Telefono:</b> <?= $data['footer']['info']['telefono'] ?><br>
                    <b>Email:</b> <?= $data['footer']['info']['email'] ?><br>
                    <i class="fa fa-copyright"></i> <?= $data['footer']['info']['copyright'] ?>
                </p>
            </div>
            <div class="footer-social">
                <h5>Contattami sui Social!</h5>
                <?php foreach ($data['footer']['social'] as $social): ?>
                    <i class="fa <?= $social['icona'] ?>" style="font-size:24px"></i>
                    <a href="<?= $social['link'] ?>" target="_blank"><?= $social['nome'] ?></a><br>
                <?php endforeach; ?>

                <h5 style="margin-top: 10px;">Privacy&Cookies Policy</h5>
                <?php foreach ($data['footer']['policy'] as $policy): ?>
                    <a href="<?= $policy['link'] ?>" target="_blank"><?= $policy['nome'] ?></a><br>
                <?php endforeach; ?>
            </div>
        </div>
    </footer>

</body>

</html>