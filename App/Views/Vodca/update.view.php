<div class="vodca_background">
    <div class="vodca-box-update">

        <form class="form" method="post" action="?c=vodca&a=store" enctype="multipart/form-data">
            <?php /** @var App\Models\Vodca $data */
            if($data->getId()) { ?>
            <input type="hidden" name="id" value="<?php echo $data->getId() ?>">
            <?php }?>
            <label>
                <h2>Horský vodca úprava</h2>
                <div class="input-box">
                    <input type="text" id="meno" name="meno" value="<?php echo $data->getMeno() ?>" maxlength="20" pattern="[^' ']+" required>
                    <span>Meno</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="priezvisko" name="priezvisko" value="<?php echo $data->getPriezvisko() ?>" maxlength="20" pattern="[^' ']+" required>
                    <span>Priezvisko</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="telefon" name="telefon" value="<?php echo $data->getTelefon() ?>" maxlength="13" pattern="^[+]?[()/0-9. -]{9,}$" required>
                    <span>Telefon</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="number" id="vek" name="vek" value="<?php echo $data->getVek() ?>" maxlength="2" min="18" required>
                    <span>Vek</span>
                    <i></i>
                </div>
            </label>
            <input type="submit" value="Uložiť">
        </form>
    </div>
</div>