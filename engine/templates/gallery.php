<h1>Фотогалерея</h1>
<? if(!empty($message)): ?>
<p class="error-message">
    <?=$message?>
</p>
<? endif; ?>


<div class="gallery">
    <form action="" method="get">Сортировка изображений по:
        <select name="sort" id="sort">
            <option value="likes">Популярность</option>
            <option value="feedback">Кол-во отзывов</option>
            <option value="idx">Дата</option>
            <option value="price">Цена</option>
        </select>
        Направление:
        <select name="direct" id="direct">
            <option value="desc">По убыванию</option>
            <option value="asc">По возрастанию</option>
        </select>
        <input type="submit" value="Сортировать">
    </form>

    <? foreach ($images as $image): ?>
        <div class="photo"><a href="<?='../image/' . $image['idx']?>" target="blank">
            <img src="<?='../' . THUMB_DIR . '/' . $image['filename']?>" width="150" height="100" />
        <div id="likes-count_<?=$image['idx']?>" class="likes-count"><?=$image['likes']?></div>
                <div class="price" id="price"><?=$image['price']?></div></a>
        <input id="lucas" data-id="<?=$image['idx']?>" class="like" type="submit" value=""/>
        </div>

<? endforeach; ?>
</div>

<form method="POST" enctype="multipart/form-data" class="load">
            <p>Загрузить новое изображение в галерею:</p>
            <input type="text" name="describe" placeholder="Добавить описание изображения">Добавить описание изображения<br>
            <input type="text" name="price" placeholder="Цена лота">Цена лота<br>
            <input type="file" name="new-file"><br>
            <input type="submit" value="Загрузить" name="upload">
        </form>

