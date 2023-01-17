<?php $layout = 'auth' ?>
<div class="registration-body">
    <div class="login-box">
        <form class="form" method="post" action="?c=auth&a=registration">
            <?php
            /** @var \App\Core\IAuthenticator $auth */
            if ($auth->isLogged()) {
                $data = \App\Models\Osoba::getOneByEmail($auth->getLoggedUserName());
            } ?>

            <input type="hidden" name="id" value="<?php echo $data->getId() ?>">

            <label>
                <h2>Zmena údajov</h2>
                <div class="input-box">
                    <input type="text" id="meno" name="meno" value="<?php echo $data->getMeno() ?>" maxlength="20" pattern="[^' ']+" required>
                    <span>Meno</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="priezvisko" name="priezvisko" value="<?php echo $data->getPriezvisko() ?>" maxlength="20" pattern="[^' ']+" required>
                    <span>Priezvisko</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="text" id="telefon" name="telefon" value="<?php echo $data->getTelefon() ?>" maxlength="13" pattern="^[+]?[()/0-9. -]{9,}$" required>
                    <span>Telefon</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="email" value="<?php echo $data->getEmail() ?>" maxlength="30" pattern="[^' ']+" required>
                    <span>Email</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input type="password" id="heslo" name="heslo" value="<?php echo $data->getHeslo() ?>" maxlength="20" pattern="[^' ']+" required="required">
                    <span>Heslo</span>
                    <i></i>
                </div>
            </label>
            <div class="visibilityPassword" onclick="visibilityPassword()"><i class="fa-solid fa-eye-low-vision" id="oko"></i></div>
            <input type="submit" id="zmenit" value="Zmeniť">
        </form>
    </div>
</div>
