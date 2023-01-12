<?php
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-fluid">

    <?php if (true) { ?>

        <div class="cart-body-admin">
            <a href="?c=poistenie">
                <img class="insurance" src="public/images/insurance.png" alt="Add insurance" style="height: 20vw; width: 20vw">
            </a>
            <a href="?c=vodca">
                <img class="leader" src="public/images/hiking_leader.png" alt="Add leader" style="height: 20vw; width: 20vw">
            </a>

        </div>

    <?php } else if(2 == 1) { ?>
        $auth->isLogged()
        //sem pôjde zobrazenie výstupov   ToDo

    <?php } else { ?>
        <div class="cart-body">
            <a href="?c=auth&a=login">
                <img class="loginfirst" src="public/images/login.png" alt="Login first" style="height: 20vw; width: 20vw">
            </a>
        </div>

    <?php } ?>

<div>