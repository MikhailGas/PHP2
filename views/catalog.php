<div class="catalog">
    <?foreach($catalog as $item):?>
        <h2><a href="/?c=product&a=showProduct&id=<?=$item->id?>"><?=$item->product?></a></h2>
        <p><?=$item->description?></p>
        <h1><?=$item->price?></h1>
        <a href="/?c=cart&a=addToCart">Добавить в корзину</a>
    <?endforeach?>
</div>