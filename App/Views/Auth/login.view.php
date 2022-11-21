<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="login-box">
    <div class="form">
        <h2>PRIHLÁSENIE</h2>
        <div class="input-box">
            <input type="text" name="email" required="required">
            <span>Email</span>
            <i></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" required="required">
            <span>Heslo</span>
            <i></i>
        </div>
        <div class="links">
            <a href="?c=auth&a=forgpassw">Zabudnuté heslo</a>
            <a href="?c=auth&a=regist">Registrácia</a>
        </div>
        <input type="submit" value="Login">
    </div>
</div>
