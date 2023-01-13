<?php
/** @var \App\Core\IAuthenticator $auth */
?>

<div class="container-fluid">

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
        <div class="cart-body">
            <a href="?c=auth&a=login">
                <img class="loginfirst" src="public/images/hiking_leader.png" alt="Login first" style="height: 20vw; width: 20vw">
            </a>
        </div>

    <?php } ?>

<div>