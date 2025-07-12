<?php
$id = $_GET['id'] ?? null;
if (!$id) die("Parametro ID mancante");

$path = __DIR__ . '/imieilavori.json';
if (!file_exists($path)) die("File JSON non trovato: $path");
$jsonData = file_get_contents($path);
if (!$jsonData) die("Impossibile leggere il JSON");
$data = json_decode($jsonData, true);
if ($data === null) die("JSON non valido: " . json_last_error_msg());

function trovaLavoro($data, $id)
{
    foreach ($data['main']['works'] as $categoria) {
        foreach ($categoria['lavori'] as $l) {
            if ($l['id'] === $id) return $l;
        }
    }
    return null;
}

$l = trovaLavoro($data, $id);
if (!$l) die("Lavoro non trovato");

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= htmlspecialchars($l['nome']) ?> - Otter's Club</title>
    <?php foreach ($l['css'] as $c): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($c) ?>">
    <?php endforeach; ?>
    <link rel="icon" href="Immagini/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="container">
            <div class="presentation-work">
                <div id="image-circle">
                    <img id="image" src="<?= $l['immagine']['src'] ?>" alt="<?= $l['immagine']['alt'] ?>">
                </div>
                <div id="presentation">
                    <h1 style="text-align:center;"><?= htmlspecialchars($l['nome']) ?></h1>
                    <p style="text-align:center;">
                        Cliente: <?= htmlspecialchars($l['cliente']) ?><br>
                        Periodo: <?= htmlspecialchars($l['periodo']) ?><br>
                        Tipo di Lavoro: <?= htmlspecialchars($l['tipo']) ?><br>
                        Link: <a href="<?= htmlspecialchars($l['url_progetto']) ?>"><?= htmlspecialchars($l['nome']) ?></a>
                    </p>
                </div>
                <div id="image-circle2">
                    <img id="image1" src="<?= $l['immagine']['src'] ?>" alt="<?= $l['immagine']['alt'] ?>">
                </div>
            </div>

            <div class="description-work">
                <div id="description">
                    <h3>Tipo di Progetto:</h3>
                    <p><?= htmlspecialchars($l['dettaglio']['descrizione1']) ?></p><br>
                    <h3>Come è stato creato:</h3>
                    <p><?= htmlspecialchars($l['dettaglio']['howto']) ?></p><br>
                    <h3>Future applicazioni:</h3>
                    <p><?= htmlspecialchars($l['dettaglio']['future']) ?></p>
                </div>
                <div id="project-picture">
                    <img id="projectp" src="<?= $l['dettaglio']['immagine_lavoro'] ?>" alt="" width="450" height="350">
                </div>
            </div>

            <div class="workslist" style="text-align:center;">
                <div id="list">
                    <h2>Altri lavori simili:</h2>
                    <?php foreach ($l['dettaglio']['works_simili'] as $w): ?>
                        <img src="<?= $w['src'] ?>" alt="<?= htmlspecialchars($w['nome']) ?>" width="100"><br>
                        <?= htmlspecialchars($w['nome']) ?><br>
                    <?php endforeach; ?>
                </div>

                <div id="feedback" style="text-align:center;">
                    <h3>Come valuti questo progetto?</h3>
                    <i class="fa fa-thumbs-o-up" style="font-size:48px;color:green;"></i>
                    <i class="fa fa-thumbs-o-down" style="font-size:48px;color:rgb(169,22,22)"></i>
                    <p>
                        Cosa ne pensi? Se ti piace il lavoro...
                        clicca <a href="<?= htmlspecialchars($l['dettaglio']['feedback_link']) ?>">QUI</a>.
                        Oppure scrivi a <a href="mailto:<?= htmlspecialchars($l['dettaglio']['feedback_email']) ?>">
                            <?= htmlspecialchars($l['dettaglio']['feedback_email']) ?></a>.
                    </p>
                </div>
            </div>
        </div>
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