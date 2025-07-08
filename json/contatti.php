<?php
session_start();

// Carica dati JSON
$json = file_get_contents('contatti.json');
$data = json_decode($json, true);
if ($data === null) {
    die('Errore nel caricamento del file JSON');
}

// Recupera errori, vecchi dati e messaggio di successo dalla sessione
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors'], $_SESSION['old'], $_SESSION['success']);
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
</head>

<body>

    <header>
        <nav class="ham-menu">
            <input id="controll" type="checkbox">
            <label class="label-controll" for="controll"><span></span></label>
            <a href="index.php"><img class="logo" src="<?= htmlspecialchars($data['menu']['logo']) ?>" alt="logo"></a>
            <ul id="menu">
                <?php foreach ($data['menu']['voci'] as $voce): ?>
                    <li class="voci"><a href="<?= htmlspecialchars($voce['link']) ?>"><?= htmlspecialchars($voce['nome']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1 style="text-align: center;"><?= htmlspecialchars($data['main']['titolo']) ?></h1><br>

        <?php if ($success): ?>
            <p style="color: green; text-align: center; font-weight: bold;"><?= htmlspecialchars($success) ?></p><br>
        <?php endif; ?>

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
                                        <select id="<?= htmlspecialchars($campo['name']) ?>" name="<?= htmlspecialchars($campo['name']) ?>"
                                            style="<?= isset($errors[$campo['name']]) ? 'border:1px solid red;' : '' ?>">
                                            <?php foreach ($campo['opzioni'] as $opzione): ?>
                                                <option value="<?= htmlspecialchars($opzione['value']) ?>"
                                                    <?= (isset($old[$campo['name']]) && $old[$campo['name']] === $opzione['value']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($opzione['testo']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if (isset($errors[$campo['name']])): ?>
                                            <small style="color:red;"><?= htmlspecialchars($errors[$campo['name']]) ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php elseif ($campo['tipo'] === 'text'): ?>
                                <div class="row">
                                    <div class="col-30">
                                        <label class="contact" for="<?= htmlspecialchars($campo['name']) ?>"><?= htmlspecialchars($campo['label']) ?></label>
                                    </div>
                                    <div class="col-70">
                                        <input type="text" id="<?= htmlspecialchars($campo['name']) ?>" name="<?= htmlspecialchars($campo['name']) ?>"
                                            value="<?= htmlspecialchars($old[$campo['name']] ?? '') ?>"
                                            style="<?= isset($errors[$campo['name']]) ? 'border:1px solid red;' : '' ?>">
                                        <?php if (isset($errors[$campo['name']])): ?>
                                            <small style="color:red;"><?= htmlspecialchars($errors[$campo['name']]) ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php elseif ($campo['tipo'] === 'radio-group'): ?>
                                <div class="row">
                                    <fieldset style="<?= isset($errors[$campo['name']]) ? 'border:1px solid red; padding: 10px;' : '' ?>">
                                        <legend>
                                            <?= htmlspecialchars($campo['label']) ?>
                                            <a href="<?= htmlspecialchars($campo['link']['href']) ?>" title="Visita la Privacy Policy">
                                                <?= htmlspecialchars($campo['link']['testo']) ?>
                                            </a>
                                        </legend>
                                        <?php foreach ($campo['opzioni'] as $opzione): ?>
                                            <label>
                                                <input type="radio" name="<?= htmlspecialchars($campo['name']) ?>" value="<?= htmlspecialchars($opzione['value']) ?>"
                                                    <?= (isset($old[$campo['name']]) && $old[$campo['name']] === $opzione['value']) ? 'checked' : '' ?>>
                                                <?= htmlspecialchars($opzione['testo']) ?>
                                            </label><br>
                                        <?php endforeach; ?>
                                        <?php if (isset($errors[$campo['name']])): ?>
                                            <small style="color:red;"><?= htmlspecialchars($errors[$campo['name']]) ?></small>
                                        <?php endif; ?>
                                    </fieldset><br>
                                </div>

                            <?php elseif ($campo['tipo'] === 'textarea'): ?>
                                <div class="row">
                                    <div class="col-30">
                                        <label class="contact" for="<?= htmlspecialchars($campo['name']) ?>"><?= htmlspecialchars($campo['label']) ?></label>
                                    </div>
                                    <div class="col-70">
                                        <textarea id="<?= htmlspecialchars($campo['name']) ?>" name="<?= htmlspecialchars($campo['name']) ?>"
                                            rows="<?= intval($campo['rows']) ?>" cols="<?= intval($campo['cols']) ?>"
                                            style="<?= isset($errors[$campo['name']]) ? 'border:1px solid red;' : '' ?>"><?= htmlspecialchars($old[$campo['name']] ?? '') ?></textarea>
                                        <?php if (isset($errors[$campo['name']])): ?>
                                            <small style="color:red;"><?= htmlspecialchars($errors[$campo['name']]) ?></small>
                                        <?php endif; ?>
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

    <footer>
        <div class="footer">
            <div class="footer-logo-info">
                <img id="footer-logo" src="<?= htmlspecialchars($data['footer']['logo']) ?>" alt="logo-footer"><br>
                <p>
                    <b>Sede Legale:</b> <?= htmlspecialchars($data['footer']['info']['sede']) ?><br>
                    <b>P.IVA:</b> <?= htmlspecialchars($data['footer']['info']['piva']) ?><br>
                    <b>Telefono:</b> <?= htmlspecialchars($data['footer']['info']['telefono']) ?><br>
                    <b>Email:</b> <?= htmlspecialchars($data['footer']['info']['email']) ?><br>
                    <i class="fa fa-copyright"></i>
                    <?= htmlspecialchars($data['footer']['info']['copyright']) ?>
                </p>
            </div>

            <div class="footer-social">
                <h5>Contattami sui