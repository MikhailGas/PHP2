<div class="catalog">
    <?foreach($catalog as $item):?>
        <h2><a href="/product/showProduct?id=<?=$item->id?>"><?=$item->product?></a></h2>
        <p><?=$item->description?></p>
        <h1><?=$item->price?></h1>
        <a href="/cart/addToCart">Добавить в корзину</a>
    <?endforeach?>
</div>