<?php /** @var \App\Models\Vystup $data */ ?>

<div class="trasa-body">
    <div class="trasa-box">
        <form class="form" method="post" action="?c=trasa&a=store">
            <input type="hidden" id="id" name="id" value="<?php echo $data->getId() ?>">
            <label>
                <h2 id="info">Pridanie trasy</h2>
                <div class="input-box">
                    <input type="text" id="nazov" name="nazov" maxlength="20" pattern="[^' ']+" required>
                    <span id="ins">Názov</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="typ" name="typ" maxlength="15" pattern="[^' ']+" required>
                    <span>Typ trasy</span>
                    <i></i>
                </div>
            </label>
            <input type="submit" value="Pridať">
        </form>
    </div> <br><br>
    <ul>
        <?php
        $trasy = \App\Models\Trasa::getAll();

        foreach ($trasy as $trasa) {
            if ($trasa->getIdVystup() == $data->getId()) {?>
            <li>
                <div class="delete_trasa">
                    <div class="text">
                        <h2><?php echo $trasa->getNazov()?></h2>
                        <a href="?c=trasa&a=delete&id=<?php echo $trasa->getId()?>">X</a>
                    </div>
                    <h2> Typ: &ensp;<?php echo $trasa->getTypTrasy()?></h2>
                </div>
            </li>
        <?php }
        } ?>
    </ul>
    <h3></h3>
</div>
