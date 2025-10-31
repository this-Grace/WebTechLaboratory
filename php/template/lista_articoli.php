<h2><?php echo $templateParams["titolopagina"]; ?></h2>
<?php foreach($templateParams["articoli"] as $articolo): ?>
        <article>
            <img src="<?php echo UPLOAD_DIR.$articolo["imgarticolo"]; ?>" alt="">
            <h3><?php echo $articolo["titoloarticolo"]; ?></h3>
            <p><?php echo $articolo["dataarticolo"]; ?> - <?php echo $templateParams["nome"]; ?></p>
            <p><?php echo $articolo["anteprimaarticolo"]; ?></p>
            <a href="#">Leggi tutto</a>
        </article>
        <?php endforeach; ?>
    