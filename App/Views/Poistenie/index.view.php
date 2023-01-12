<div class="insurance-body">
    <div class="insurance-box">
        <form class="form" method="post" action="?c=poistenie&a=store">
            <label>
                <h2>Pridanie poistenia</h2>
                <div class="input-box">
                    <input type="text" id="nazov" name="nazov" maxlength="20" required>
                    <span>Názov</span>
                    <i></i>
                </div>
            </label>
            <input type="submit" value="Pridať">
        </form>
    </div> <br><br>
        <ul>
            <?php
            use App\Models\Poistenie;
            /** @var Poistenie[] $data */

            foreach ($data as $poistenie) { ?>
                    <li>
                        <div class="delete_poistenie">
                            <div class="text">
                                <h2><?php echo $poistenie->getNazov()?></h2>
                                <a href="?c=poistenie&a=delete&id=<?php echo $poistenie->getId()?>">X</a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
        </ul>
    <h3></h3>
</div>