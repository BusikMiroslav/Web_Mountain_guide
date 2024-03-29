<div class="container-fluid">
    <?php /** @var \App\Models\Vystup $data */ ?>
    <body class="form_background">
    <div class="form_vystup">
        <form oninput="return changeText()" onmousemove="return changeNadpis()" method="post" action="?c=vystup&a=store" enctype="multipart/form-data">
            <?php if($data->getId()) { ?>
                <input type="hidden" name="id" id="id" value="<?php echo $data->getId() ?>">
            <?php }?>
            <div class="form_parts">

                <label>
                    <b id="txtnadpis">Nový výstup</b><br><br>
                    <p id="txtnazov">Zadaj názov vrcholu</p>
                    <input id="nazov" type="text" name="nazov_vrcholu" value="<?php echo $data->getNazovVrcholu() ?>" maxlength="20" pattern="^((?!DELETE)(?!delete)(?!DROP)(?!drop).)*$" required><br><br>
                    <p id="txtcena">Zadaj cenu</p>
                    <input id="cena" type="number" name="cena" value="<?php echo $data->getCena() ?>" min="0" max="2000" required><br><br>
                    <p id="txtpopis">Zadaj popis</p>
                    <textarea id="popis" cols="32" rows="6" type="text" name="popis"><?php echo $data->getPopis() ?></textarea><br><br>
                    <?php if ($data->getObrazok() == null) { ?>
                        <input type="file" name="img" id="img" required><br><br>
                    <?php } ?>
                </label>
                <input type="submit" value="Odoslať">
            </div>
        </form>
    </div>
    </body>
</div>
