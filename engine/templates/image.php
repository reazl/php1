<h1>Фотогалерея</h1>
<div class="item">
<div class="photo">
            <img src="<?='/' . THUMB_DIR . '/' . $image?>" width="150" height="100" />
        <div id="likes-count_<?=$id?>" class="likes-count"><?=$likes?></div>
<input id="lucas" data-id="<?=$id?>" class="like" type="submit" value=""/>
</div>
<div class="describe">Описание лота: <?=$describe?></div>
    <div class="price">Цена: <?=$price?></div>
    <button class="buy-btn">Купить оригинал</button>
</div>


<h2>Отзывы</h2>

<form action="/image/<?=$formAction?>/?backid=<?=$id?>" method="post">
    <?=$status?> <br>
    <input hidden type="text" name="id" value="<?=$edit_id?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="message" placeholder="Текст отзыва" value="<?=$message?>"><br>
    <input type="submit" name="send" value="<?=$textAction?>">
</form>


<? foreach ($feedback as $item): ?>
    <p><b><?= $item['name'] ?></b>: <?= $item['feedback'] ?>
        <a href="/image/edit/<?=$item['id']?>/?backid=<?=$id?>">[edit]</a>
        <a href="/image/delete/<?=$item['id']?>/?backid=<?=$id?>">[X]</a>
    </p>

<? endforeach; ?>

<? include_once ENGINE_DIR . 'feedback-item.php'; ?>