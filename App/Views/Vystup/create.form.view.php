<div class="container-fluid">
    <body class="form_background">
    <div class="form_vystup">
        <form oninput="return changeText()" method="post" action="?c=vystup&a=store" enctype="multipart/form-data">
            <?php /** @var \App\Models\Vystup $data */
            if($data->getId()) { ?>
                <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
            <?php }?>
            <div class="form_parts">

                <label>
                    <b id="txtnadpis">Nový výstup</b><br><br>
                    <p id="txtnazov">Zadaj názov vrcholu</p>
                    <input id="nazov" type="text" name="nazov_vrcholu" value="<?php echo $data->getNazovVrcholu() ?>" maxlength="20" required><br><br>
                    <p id="txtcena">Zadaj cenu</p>
                    <input id="cena" type="number" name="cena" value="<?php echo $data->getCena() ?>" min="0" max="2000" required><br><br>
                    <p id="txtpopis">Zadaj popis</p>
                    <textarea id="popis" cols="32" rows="6" type="text" name="popis"><?php echo $data->getPopis() ?></textarea><br><br>
                    <input type="file" name="img" value="<?php echo $data->getObrazok() ?>" id="img" required><br><br>
                </label>
                <input type="submit" value="Odoslať">
            </div>
        </form>
    </div>
    </body>
</div>
