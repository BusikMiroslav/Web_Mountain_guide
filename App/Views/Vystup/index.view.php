<div class="container-fluid">
    <div class="eshop-body">

        <div class="product-area">
            <div class="vytvor_vystup">
                <a href="?c=vystup&a=create">Vytvor vystup</a>
            </div>
            <ul class="product-grid">
                <?php
                use App\Models\Vystup;
                /** @var Vystup[] $data */
                foreach ($data as $vystup) {
                    ?>
                    <li>
                        <div class ="product product-img">
                            <div class="delete_edit">
                                <a href="?c=vystup&a=delete&id=<?php echo $vystup->getId() ?>">Zmazať</a>
                                <a href="?c=vystup&a=edit&id=<?php echo $vystup->getId() ?>">Upraviť</a>
                            </div>
                            <a href="#">
                                <h3><?php echo $vystup->getNazovVrcholu() ?></h3>
                            </a>
                        </div>
                    </li>
                 <?php } ?>
            </ul>
        </div>
    <div>
<div>