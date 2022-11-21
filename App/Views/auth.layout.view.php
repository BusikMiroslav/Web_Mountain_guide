<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkpoint1</title>

    <script src="public/js/script.js"></script>
    <link rel="stylesheet" href="public/css/styl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body class="login-body">

<header>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbutton">
            <i class="fas fa-bars"></i>
        </label>
        <img src="public/images/logo.png" alt="Logo firmy" style="height: 75px; width: 110px">

        <ul class="menu">
            <li><a href="?c=home">Home</a></li>
            <li><a href='?c=vystup&a=index'>E-shop</a></li>
            <li><a href="?c=auth&a=login">Login</a></li>
            <li><a href="?c=home&a=cart">My <i class="fa fa-person-hiking"></i></a></li>
        </ul>
    </nav>
</header>

<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>
