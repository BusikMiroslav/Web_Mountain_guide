<?php $layout = 'auth' ?>
<div class="registration-body">
    <div class="login-box">
        <form class="form" method="post" action="?c=auth&a=registration">
            <label>
            <h2>Registrácia</h2>
            <div class="input-box">
                <input type="text" id="meno" name="meno" maxlength="20" pattern="[^' ']+" required>
                <span>Meno</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="text" id="priezvisko" name="priezvisko" maxlength="20" pattern="[^' ']+" required>
                <span>Priezvisko</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="text" id="telefon" name="telefon" maxlength="13" pattern="^[+]?[()/0-9. -]{9,}$" required>
                <span>Telefon</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" maxlength="30" pattern="[^' ']+" required>
                <span>Email</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" id="heslo" name="heslo" maxlength="20" pattern="[^' ']+" required="required">
                <span>Heslo</span>
                <i></i>
            </div>
            </label>
            <div class="visibilityPassword" onclick="visibilityPassword()"><i class="fa-solid fa-eye-low-vision" id="oko"></i></div>
            <input type="submit" id="vytvorit" value="Vytvoriť">
        </form>
    </div>
</div>

