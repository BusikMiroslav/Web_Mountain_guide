<?php $layout = 'auth' ?>
<div class="forgpassw-body">
    <div class="login-box">
        <form class="form" method="post" action="?c=auth&a=forgpassw">
            <label>
                <h2>Zabudnuté heslo</h2>
                <div class="input-box">
                    <input id="email" type="email" name="email" maxlength="30" onkeyup="emailExists(this.value)" pattern="[^' ']+" required="required">
                    <span id="mail">Email</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input id="heslo" type="password" name="heslo" maxlength="20" pattern="[^' ']+" required="required">
                    <span>Nové heslo</span>
                    <i></i>
                </div>
                <div class="input-box">
                    <input id="hesloopak" type="password" name="hesloopak" onkeyup="rovnakeHeslaCheck(this.value)" onmousemove="changePasswordButton()" maxlength="20" pattern="[^' ']+" required="required">
                    <span id="infosame">Zopakuj heslo</span>
                    <i></i>
                </div>
            <input type="submit" id="odoslat" name="submit" value="Odoslať" >
            </label>
        </form>
    </div>
</div>
