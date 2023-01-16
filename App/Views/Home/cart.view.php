<?php
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="v">

    <?php if(!$auth->isLogged())  { ?>
        <div class="cart-body">
            <a href="?c=auth&a=login">
                <img class="loginfirst" src="public/images/login.png" alt="Login first" style="height: 20vw; width: 20vw">
            </a>
        </div>

    <?php } else if ($auth->getLoggedUserName() === "admin@gmail.com") { ?>
        <div class="cart-body-admin">
            <a href="?c=poistenie">
                <img class="insurance" src="public/images/insurance.png" alt="Add insurance" style="height: 20vw; width: 20vw">
            </a>
            <a href="?c=vodca">
                <img class="leader" src="public/images/hiking_leader.png" alt="Add leader" style="height: 20vw; width: 20vw">
            </a>

        </div>

    <?php } else { ?>
        <div class="profile">
            <div class="stlpce">
                <div class="user_info stlpec">
                    <h1>Môj profil</h1>
                    <?php $user = \App\Models\Osoba::getOneByEmail($auth->getLoggedUserName()) ?>
                    <p><strong>Meno: &emsp;&emsp;&nbsp;&ensp;</strong> <?php echo $user->getMeno() ?></p>
                    <p><strong>Priezvisko: &ensp;</strong> <?php echo $user->getPriezvisko() ?></p>
                    <p><strong>Telefon: &emsp;&emsp;</strong> <?php echo $user->getTelefon() ?></p>
                    <p><strong>E-mail: &ensp;&emsp;&emsp;</strong> <?php echo $user->getEmail() ?></p>
                    <a href="?c=auth&a=update">Zmena údajov</a>
                </div>
                <div class="rezerv stlpec">
                    <?php $rezervacia = \App\Models\Rezervacia::getAll() ?>
                    <h1>Moje výstupy</h1>
                    <?php foreach ($rezervacia as $rez) {
                            if ($rez->getIdOsoby() == $user->getId()) { ?>
                                <div class="user_rezervacia">
                                    <div class="text_rezervacie">
                                        <h2><strong>Vrchol: &ensp;&emsp;&nbsp;</strong><?php echo \App\Models\Vystup::getOne($rez->getIdVystupu())->getNazovVrcholu() ?></h2>
                                        <h2><strong>Poistenie: &ensp;</strong><?php echo \App\Models\Poistenie::getOne($rez->getIdPoistenia())->getNazov()?></h2>
                                        <?php if ($rez->getIdVodcu() != null) { ?>
                                            <h2><strong>Vodca: &ensp;&ensp;&emsp;</strong><?php echo \App\Models\Vodca::getOne($rez->getIdVodcu())->getMeno()?> <?php echo \App\Models\Vodca::getOne($rez->getIdVodcu())->getPriezvisko()?></h2>
                                            <h2><strong>Telefon: &ensp;&ensp;</strong> <?php echo \App\Models\Vodca::getOne($rez->getIdVodcu())->getTelefon()?></h2><br>
                                        <?php } else { ?>
                                            <h2><strong>Vodca: &ensp;&ensp;&emsp;</strong> ?</h2>
                                            <h2><strong>Telefon: &ensp;&ensp;</strong> 0905428170</h2><br>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                     } ?>
                </div>
            </div>
        </div>

    <?php } ?>

<div>