<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1><?=$header?><h1>
        <a href="cart/showCart"><button>Корзина</button></a>
        <?if(!$_SESSION['login']):?>
            <a href="user">LOGIN</a>
        <?else :?>
            <p><?=$_SESSION['login']?></p>
            <a href="user/account">Личный кабинет</a>
            <a href="user/exit">EXIT</a>
        <?endif?>
    </header>
    <hr>
    <main>
        <h1>КОНТЕНТ</h1>
        <?=$content?>
    </main>
    <hr>
    <footer>
        <h2>Это футер</h2>
    </footer>
</body>
</html>