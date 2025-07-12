<!DOCTYPE html>
<html lang="it">

<head>
    <?php
    include('link.php');
    ?>
    <title>Otter's Club-Scheda del lavoro</title>
    <link rel="stylesheet" href="CSS/main.min.css">
    <link rel="stylesheet" href="CSS/work1.min.css">

</head>

<body>
    <header>
        <?php include('menu.php');
        ?>

    </header>

    <main>
        <div class="container">
            <div class="presentation-work">
                <div id="image-circle">
                    <img id="image" src="Immagini/logo_crystal.png" alt="immaginecerchio">
                </div>
                <div id="presentation">
                    <h1 style="text-align: center;">Navbar di Cristal-Studio Dentistico</h1><br>
                    <p style="text-align: center;">Cliente: Accademia Code<br>
                        Periodo: Febbraio-Aprile 2025<br>
                        Tipo di Lavoro: Creazione di una Navbar con logo<br>
                        Link: <a href="#"></a>
                    </p>
                </div>
                <div id="image-circle2">
                    <img id="image1" src="Immagini/logo_crystal.png" alt="immaginecerchio1">
                </div>
            </div>


            <div class="description-work">
                <div id="description">
                    <h3>Tipo di Progetto:</h3>
                    <p>Nuova Navbar con Logo per lo studio Dentistico </p><br>
                    <h3>Come è stato creato:</h3>
                    <p>Ho impostato le caratteristiche principali della navbar, creando lo scheletro con HTML5. Successivamente, ho apportato modifiche al CSS rendendo i tag <i>ul</i> e <i>li</i> visivamente più accattivanti. In seguito, ho deciso di apportare modifiche al colore, all'<i>hover</i> e alla dinamicità del menù.
                    </p><br>
                    <h3>Future applicazioni:</h3>
                    <p>E' una buona base solida per poter strutturare future navbar. Si implementerà con JS, non appena sarà possibile rendendo quindi il passaggio di device più semplice e dinamico, permettedo l'inserimento di un menù ad hamburger per dispositivi mobile. </p>
                </div>
                <div id="project-picture">
                    <img id="projectp" src="Immagini/mestil.png" alt="mestil" width="450" height="450">
                </div>
            </div>

            <div class="workslist" style="text-align: center;">
                <div id="list">
                    <h2>Altri lavori simili:</h2>

                    <img id="work" src="Immagini/gdrbychat.png" alt="gdrbychat" width="100" height="100"><br>GDR
                    by Chat<br>
                    <img id="work2" src="Immagini/watercolor2.png" alt="watercolor2" width="100"
                        height="100"><br>Art&Watercolor by Stefania Curzi<br>
                    <img id="work3" src="Immagini/ristorante-perla.png" alt="ristorante-perla" width="100"
                        height="100"><br>Sito Ristorante "La Perla"
                </div>

                <div id="feedback" style="text-align: center;">
                    <h3> Come valuti questo progetto?</h3>
                    <i class="fa fa-thumbs-o-up" style="font-size:48px;color:green;"></i>
                    <i class=" fa fa-thumbs-o-down" style="font-size:48px;color:rgb(169, 22, 22)"></i>
                    <p>Cosa ne pensi? Se ti piace il lavoro e vuoi qualcosa di simile, clicca <a
                            href="contatti.html">QUI</a>. Altrimenti, puoi sempre richiedere un appuntamento, sia
                        tramite il link precedente che per email a questo indirizzo: michelangelo.agasucci@gmail.com! Ti
                        aspetto :)</p>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.php');
    ?>
</body>