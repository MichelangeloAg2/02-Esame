<!DOCTYPE html>
<html lang="it">

<head>
    <title>Otter's Club-Homepage</title>
    <?php
    include('link.php');
    ?>
    <link rel="stylesheet" href="CSS/main.min.css">
    <link rel="stylesheet" href="CSS/index.min.css">
</head>

<body>
    <header>
        <?php
        include('menu.php');
        ?>
    </header>
    <main>
        <div class="container">
            <div class="img">
                <img class="presentation" src="Immagini/header.png" alt="H1">
            </div>
            <br>

            <h1 style="text-align: center;">Le mie offerte!</h1><br>
            <div class="container-offerte">
                <div class="offerta1" style="text-align: center;">
                    <h3><a href="services.php" title="Servizi">Pacchetto Vetrina</a></h3>
                    <img id="offerta1" src="Immagini/offerta.png" alt="offerta1">
                    <p style="margin-bottom: 10px;">Comprende:<br>
                        Codice Back/Front End<br>
                        Studio in Figma<br>
                        Set Fotogradico<br>
                    </p>
                </div>
                <div class="offerta2" style="text-align: center;">
                    <h3><a href="services.php" title="Servizi">Pacchetto Sito Web Advanced</a></h3>
                    <img id="offerta2" src="Immagini/offerta.png" alt="offerta2">
                    <p style="margin-bottom: 10px;">Comprende:<br>
                        Codice Back/Front End<br>
                        Pannello amministrazione<br>
                        Area Riservata Clienti/Soci<br>

                    </p>
                </div>
                <div class="offerta3" style="text-align: center;">
                    <h3><a href="services.php" title="Servizi">Pacchetto E-commerce</a></h3>
                    <img id="offerta3" src="Immagini/offerta.png" alt="offerta3">
                    <p style="margin-bottom: 10px;">Comprende:<br>
                        Codice Back/Front End<br>
                        Grafica personalizzata<br>
                        Pannello di controllo ordini e vetrina prodotti<br>
                    </p>
                </div>

            </div><br>
            <h1 style="text-align: center;">I miei progetti</h1><br>
            <div class="container-progetti">
                <div class="responsive">
                    <div class="galleria">
                        <a target="_blank" href="i-miei-lavori.html" title="Visita il mio Portfolio">
                            <img src="Immagini/ciliegio.png" alt="ciliegio">
                        </a>
                        <div class="descrizione">Fiori di ciliegio</div>
                    </div>
                </div>

                <div class="responsive">
                    <div class="galleria">
                        <a target="_blank" href="i-miei-lavori.html" title="Visita il mio Portfolio">
                            <img src="Immagini/gdrbychat.png" alt="GDR">
                        </a>
                        <div class="descrizione">GDR by Chat</div>
                    </div>
                </div>

                <div class="responsive">
                    <div class="galleria">
                        <a target="_blank" href="i-miei-lavori.html" title="Visita il mio Portfolio">
                            <img src="Immagini/ristorante-perla.png" alt="ristorante">
                        </a>
                        <div class="descrizione">Ristorante "La Perla"</div>
                    </div>
                </div>

                <div class="responsive">
                    <div class="galleria">
                        <a target="_blank" href="i-miei-lavori.html" title="Visita il mio Portfolio">
                            <img src="Immagini/watercolor2.png" alt="watercolor2">
                        </a>
                        <div class="descrizione">Watercolor by SC</div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="responsive">
                    <div class="galleria">
                        <a target="_blank" href="i-miei-lavori.html" title="Visita il mio Portfolio">
                            <img src="Immagini/watercolor1.png" alt="watercolor1">
                        </a>
                        <div class="descrizione">Watercolor by SC</div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="responsive">
                    <div class="galleria">
                        <a target="_blank" href="i-miei-lavori.html" title="Visita il mio Portfolio">
                            <img src="Immagini/buttonplug.png" alt="buttonplug">
                        </a>
                        <div class="descrizione">Button&Plug</div>
                    </div>
                </div>
                <div class="clearfix"></div>

            </div>
            <h3 style="text-align: center; margin-top: 20px;">
                Vuoi saperne di più? Clicca <a href="contatti.html" title="Contattami">QUI</a> e compila il form. Fisseremo
                un
                appuntamento e valuteremo quale offerta o prodotto ti piace di più!
            </h3><br>

    </main>

    <?php include('footer.php'); ?>
</body>