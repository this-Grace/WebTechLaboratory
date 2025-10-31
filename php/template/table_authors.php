<h2><?php echo $templateParams["titolopagina"]; ?></h2>

<table>
    <tr>
        <th id="autore">Autore</th>
        <th id="email">Email</th>
        <th id="argomenti">Argomenti</th>
    </tr>

    <?php foreach ($templateParams["autori"] as $autore): 
        $id = $dbh->getIdFromName($autore["nome"]);
    ?>
        <tr>
            <th id="<?php echo $id; ?>"><?php echo $autore["nome"]; ?></th>
            <td headers="<?php echo $id; ?> email">
                <?php echo $autore["username"]; ?>@blogtw.com
            </td>
            <td headers="<?php echo $id; ?> argomenti">
                <?php echo $autore["argomenti"]; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
