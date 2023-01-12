<div class="container-fluid">
    <div class="vodca-body">
        <div class="vodca-box">
            <form class="form" method="post" action="?c=vodca&a=store">
                <label>
                    <h2>Nový horský vodca</h2>
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
                        <input type="text" id="telefon" name="telefon" maxlength="13" pattern="^[+]?[()/0-9. -]{9,}$" required>
                        <span>Telefon</span>
                        <i></i>
                    </div>
                    <div class="input-box">
                        <input type="number" id="vek" name="vek" maxlength="2" min="18" required>
                        <span>Vek</span>
                        <i></i>
                    </div>
                </label>
                <input type="submit" value="Pridať">
            </form>
        </div> <br><br>

        <?php
        use App\Models\Vodca;
        /** @var Vodca[] $data */

        foreach ($data as $vodca) { ?>
            <li>
                <div class="delete_poistenie">
                    <div class="text">
                        <h2><?php echo $vodca->getMeno()?></h2>
                        <h3>X</h3>
                        <a href="?c=poistenie&a=delete&id=<?php echo $vodca->getId()?>">X</a>
                    </div>
                </div>
            </li>
        <?php } ?>
    </div>
</div>
