<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="login-box">
    <form class="form" method="post" action="?c=auth&a=login">
        <label>
            <h2>PRIHLÁSENIE</h2>
            <div class="input-box">
                <input type="text" name="email" id="email" pattern="[^' ']+" required="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" maxlength="20" pattern="[^' ']+" required="required">
                <span>Heslo</span>
                <i></i>
            </div>
            <div class="links">
                <a href="?c=auth&a=forgpassw">Zabudnuté heslo</a>
                <a href="?c=auth&a=regist">Registrácia</a>
            </div>
            <input type="submit" name="submit" value="Login">
            <p class="allert"><?= @$data['message'] ?></p>
        </label>
        <?php unset($data['message']) ?>
    </form>
</div>
