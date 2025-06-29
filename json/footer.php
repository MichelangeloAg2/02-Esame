<footer>
    <div class="footer">
        <div class="footer-logo-info">
            <img id="footer-logo" src="<?php echo $dati['footer']['logo']; ?>" alt="Logo Footer"><br>
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
            <?php foreach ($dati['footer']['social'] as $social) : ?>
                <i class="fa <?php echo $social['icona']; ?>" style="font-size:24px"></i>
                <a href="<?php echo $social['link']; ?>" target="_blank" title="<?php echo $social['nome']; ?>">
                    <?php echo $social['nome']; ?>
                </a><br>
            <?php endforeach; ?>

            <h5 style="margin-top: 10px;">Privacy & Cookies Policy</h5>
            <?php foreach ($dati['footer']['policy'] as $policy) : ?>
                <a href="<?php echo $policy['link']; ?>" target="_blank" title="<?php echo $policy['nome']; ?>">
                    <?php echo $policy['nome']; ?>
                </a><br>
            <?php endforeach; ?>
        </div>
    </div>
</footer>