<header>
    <nav class="ham-menu">
        <input id="controll" type="checkbox">
        <label class="label-controll" for="controll">
            <span></span>
        </label>

        <!-- Logo -->
        <a href="index.php">
            <img class="logo" src="<?php echo $dati['menu']['logo']; ?>" alt="Logo">
        </a>

        <!-- Voci Menu -->
        <ul id="menu">
            <?php foreach ($dati['menu']['voci'] as $voce) : ?>
                <li class="voci">
                    <a href="<?php echo $voce['link']; ?>"><?php echo $voce['nome']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>