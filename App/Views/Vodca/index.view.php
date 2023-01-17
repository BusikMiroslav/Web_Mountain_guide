<div class="vodca_background">
    <div class="vodca-box">

        <form class="form" method="post" action="?c=vodca&a=store" enctype="multipart/form-data">
            <label>
                <h2>Horský vodca</h2>
                <div class="input-box">
                    <input type="text" id="meno" name="meno" maxlength="20" required>
                    <span>Meno</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="priezvisko" name="priezvisko" maxlength="20" required>
                    <span>Priezvisko</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="telefon" name="telefon" onkeyup="numberUsedCheck(this.value)" maxlength="13" pattern="^[+]?[()/0-9. -]{9,}$" required>
                    <span id="mobil">Telefon</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="number" id="vek" name="vek" maxlength="2" min="18" required>
                    <span>Vek</span>
                    <i></i>
                </div>
            </label>
            <input type="submit" value="Uložiť">
        </form>
    </div> <br><br>

    <?php
    use App\Models\Vodca;
    /** @var Vodca[] $data */

    foreach ($data as $vodca) { ?>

            <div class="delete_vodca">
                <div class="text_vodca">
                    <h2><?php echo $vodca->getMeno()?>  <?php echo $vodca->getPriezvisko()?></h2>
                    <h2><?php echo $vodca->getTelefon()?></h2>
                    <h2>Vek: <?php echo $vodca->getVek()?></h2><br>
                    <div class="delete_edit_vodca">
                        <a href="?c=vodca&a=delete&id=<?php echo $vodca->getId()?>">Zmazať</a>
                        <a href="?c=vodca&a=edit&id=<?php echo $vodca->getId() ?>">Upraviť</a>
                    </div>
                </div>
            </div>

    <?php } ?>
    <h3></h3>
</div>