<!DOCTYPE html>
<html lang="it">

<head>
    <?php
    include('link.php');
    ?>
    <title>Otter's Club-Portfolio</title>
    <link rel="stylesheet" href="CSS/main.min.css">
    <link rel="stylesheet" href="CSS/chisono.min.css">

</head>

<body>
    <header>
        <?php include('menu.php'); ?>

    </header>

    <main>
        <h1>Conosciamoci!</h1><br>
        <h2>Me, myself and I... In breve!</h2>
        <div class="myself">
            <div id="picmys">
                <img id="myself" src="Immagini/myself.png" alt="myself" width="500" height="500">
            </div>
            <div id="infomys">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel mi et enim accumsan porta. Vestibulum non nisi non tellus vulputate gravida venenatis non metus. Proin gravida sagittis nisl, ac hendrerit quam ultrices eu. Vivamus sagittis quis neque at dictum. Nam ac nunc eu dui placerat consequat. Donec sapien urna, dapibus eu enim vel, ullamcorper placerat lectus. Morbi non ligula ut dui euismod ornare sit amet vitae lacus. Donec lobortis augue quis iaculis tincidunt. Phasellus gravida sapien nec consequat iaculis.

                    Quisque porta varius quam in gravida. Aenean vitae nisl urna. Phasellus cursus varius leo, et tristique nisi maximus quis. Donec vehicula tempus consequat. Integer quis vulputate erat, sed cursus erat. Sed ac rutrum tellus, in aliquet odio. In tortor sapien, imperdiet eget mauris eget, vestibulum vulputate augue. Suspendisse potenti. Nam scelerisque rutrum nulla quis tempor. Nullam quis nisi scelerisque, interdum nunc a, pulvinar ligula. Fusce quis suscipit leo. Donec tempus metus sagittis lacus accumsan gravida blandit a augue. Aenean semper lacus at dui venenatis, et vulputate magna cursus. Ut at odio dui.</p>
            </div>
        </div><br>

        <h1>My skills and more!</h1><br>
        <h2>Cosa posso fare...</h2>

        <div class="myskill">
            <div id="infoskill">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel mi et enim accumsan porta. Vestibulum non nisi non tellus vulputate gravida venenatis non metus. Proin gravida sagittis nisl, ac hendrerit quam ultrices eu. Vivamus sagittis quis neque at dictum. Nam ac nunc eu dui placerat consequat. Donec sapien urna, dapibus eu enim vel, ullamcorper placerat lectus. Morbi non ligula ut dui euismod ornare sit amet vitae lacus. Donec lobortis augue quis iaculis tincidunt. Phasellus gravida sapien nec consequat iaculis.

                    Quisque porta varius quam in gravida. Aenean vitae nisl urna. Phasellus cursus varius leo, et tristique nisi maximus quis. Donec vehicula tempus consequat. Integer quis vulputate erat, sed cursus erat. Sed ac rutrum tellus, in aliquet odio. In tortor sapien, imperdiet eget mauris eget, vestibulum vulputate augue. Suspendisse potenti. Nam scelerisque rutrum nulla quis tempor. Nullam quis nisi scelerisque, interdum nunc a, pulvinar ligula. Fusce quis suscipit leo. Donec tempus metus sagittis lacus accumsan gravida blandit a augue. Aenean semper lacus at dui venenatis, et vulputate magna cursus. Ut at odio dui.</p>
            </div>
            <div id="picskill">
                <img id="myskill" src="Immagini/myskill.png" alt="myskyll" width="500" height="500">
            </div>
        </div>

        <h1>Vuoi conoscere meglio il mio lavoro? Dai uno sguardo <a href="i-miei-lavori.php" title="I miei lavori">QUI</a>!</h1>


    </main>

    <?php
    @include('footer.php')
    ?>