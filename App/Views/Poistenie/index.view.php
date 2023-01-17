<div class="insurance-body">
    <div class="insurance-box">
        <form class="form" method="post">
            <label>
                <h2 id="info">Pridanie poistenia</h2>
                <div class="input-box">
                    <input type="text" id="nazov" name="nazov" onkeyup="poistenieUsedCheck(this.value)" maxlength="20" pattern="[^' ']+" required>
                    <span id="ins">Názov</span>
                    <i></i>
                </div>
            </label>
            <input onclick="ulozPoistenie()" type="submit" value="Pridať">
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