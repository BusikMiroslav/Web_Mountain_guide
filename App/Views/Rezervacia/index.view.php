<?php /** @var \App\Models\Vystup $data */
      /** @var \App\Core\IAuthenticator $auth */
    if($auth->isLogged()) {
        $id_user = \App\Models\Osoba::getOneByEmail($auth->getLoggedUserName());
    }
?>

<div class="container-fluid">
<div class="section-container">
    <img class="pozadie_vystup" src="public/images/<?php echo $data->getObrazok()?>">

    <div class="info_vystup">
        <h1><?php echo $data->getNazovVrcholu() ?></h1>
        <p><strong>Cena: &ensp;</strong>  <?php echo $data->getCena() ?> €</p>
        <p><strong>Popis: &ensp;</strong>  <?php echo $data->getPopis() ?></p>
        <br>
        <?php if($auth->isLogged()) { ?>
            <form action="?c=rezervacia&a=store" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo $data->getId() ?>">
                <input type="hidden" id="user" name="user" value="<?php echo $id_user->getId() ?>">

                <p><strong>Poistenie: </strong></p>
                <select name="Poistenie" required>
                    <option value="" disabled selected>Vyber poistenie</option>
                    <?php
                    $poistenie_all = App\Models\Poistenie::getAll();

                    foreach ($poistenie_all as $poistenie) { ?>
                        <option value="<?php echo $poistenie->getId() ?>"><?php echo $poistenie->getNazov() ?></option>
                    <?php } ?>
                </select>

               <p><strong>Horský vodca: </strong></p>
                <select name="Vodca">
                    <option value="" disabled selected>Chcem si vybrať vodcu</option>
                    <?php
                    $vodca_all = App\Models\Vodca::getAll();

                    foreach ($vodca_all as $vodca) { ?>
                        <option value="<?php echo $vodca->getId() ?>"><?php echo $vodca->getMeno() ?> <?php echo $vodca->getPriezvisko() ?></option>
                    <?php } ?>
                </select><br>

                <input type="submit" name="submit" value="Objednať">
            </form>
        <?php } ?>
    </div>
</div>
</div>