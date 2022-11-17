<div class="container-fluid">
    <body class="form_background">
        <div class="form_vystup">
            <form method="post" action="?c=vystup&a=store">
                <?php /** @var \App\Models\Vystup $data */
                if($data->getId()) { ?>
                    <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
                <?php }?>
                <div class="form_parts">

                <label>
                            <b>Nový výstup</b><br><br>
                            Názov vrcholu:<br>
                            <input type="text" name="nazov_vrcholu" value="<?php echo $data->getNazovVrcholu() ?>"><br><br>
                            Cena:<br>
                            <input type="number" name="cena" value="<?php echo $data->getCena() ?>"><br><br>
                            Popis:  <br>
                            <textarea cols="32" rows="6" type="text" name="popis" value=""><?php echo $data->getPopis() ?></textarea><br><br><br>
                </label>
                <input type="submit" value="Odoslať">
                </div>
            </form>
        </div>
    </body>
</div>
