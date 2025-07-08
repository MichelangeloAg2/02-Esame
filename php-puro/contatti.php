<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otter's Club-Contatti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="Immagini/favicon.png">
    <link rel="stylesheet" href="CSS/main.min.css">
    <link rel="stylesheet" href="CSS/contacts.min.css">
</head>

<body>
    <header>
        <?php include('menu.php'); ?>

    </header>

    <main>

        <h1 style="text-align: center;">Contatti&More</h1><br>
        <div class="row">
            <div class="contatti">
                <div class="map">
                    <img id="mappa" src="Immagini/mappa.png" alt="mappa" width="450" height="350">
                </div>
                <div class="recapiti">
                    <h3 style="text-align: center;">Recapiti</h3>
                    <p style="text-align: center;">
                        <i class="fa fa-address-card-o" style="font-size:24px"></i> Otter's Club-by Michelangelo
                        Agasucci<br>
                        <i class="fa fa-phone" style="font-size:24px"></i> Telefono:+39 3484080764<br>
                        <i class="fa fa-envelope-o" style="font-size:24px"></i> Email:
                        michelangelo.agasucci@gmail.com<br>
                        <i class="fa fa-hand-o-right" style="font-size:24px"></i> Indirizzo: Viale Pantelleria n°35<br>
                        00141, Roma (RM)<br>
                        Italy
                    </p>
                </div>
            </div>
        </div><br>

        <h1 style="text-align: center;">Vuoi essere ricontattato?</h1><br>
        <div class="container">
            <p style="text-align: center;">Compila il form qui sotto! Riceverai nostre notizie nel minor tempo
                possibile!</p>
            <form action="process_form.php" method="post" novalidate>
                <div class="row">
                    <div class="col-30">
                        <label class="contact" for="motivo">Cosa ti serve?</label>
                    </div>
                    <div class="col-70">
                        <select id="motivo" name="motivo">
                            <option value="sito">Vorrei creare il mio sito</option>
                            <option value="aggiusta">Vorrei aggiornare il mio sito</option>
                            <option value="consulenza">Vorrei chiedere informazioni</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label class="contact" for="nome">Nome:</label>
                    </div>
                    <div class="col-70">
                        <input type="text" id="nome" name="nome">
                    </div>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label class="contact" for="cognome">Cognome:</label>
                    </div>
                    <div class="col-70">
                        <input type="text" id="cognome" name="cognome">
                    </div>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label class="contact" for="email">La tua mail:</label>
                    </div>
                    <div class="col-70">
                        <input type="text" id="email" name="email">
                    </div>
                </div>
                <div class="row">
                    <fieldset>
                        <legend>Presa visione della <a href="privacy-policy.html"
                                title="Visita la Privacy Policy">Privacy Policy</a> do il consenso al
                            trattamento
                            dei dati personali:</legend>
                        Acconsento<input type="radio" name="privacy" value="Acconsento"><br>
                        Non Acconsento<input type="radio" name="privacy" value="Non accontenso">
                    </fieldset><br>
                </div>
                <div class="row">
                    <div class="col-30">
                        <label class="contact" for="dettagli">Questo spazio ci aiuterà a capire bene la tua
                            richiesta. Scrivi più
                            informazioni possibili!</label>
                    </div>
                    <div class="col-70">
                        <textarea id="dettagli" name="dettagli" rows="10" cols="50"></textarea>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Invia">
                </div>
            </form>

        </div>

    </main>

    <?php include('footer.php'); ?>

</body>

</html>