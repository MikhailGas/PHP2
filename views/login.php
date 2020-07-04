<?if($login['err']):?>
    <p><?=$login['err']?></p>
<?endif?>
<form action="/user/login" method="POST">
    <input type="text" placeholder="login" name="login">
    <input type="password" placeholder="password" name="password">
    <input type="submit">
</form>