<h1>Фотогалерея</h1>
<? if(!empty($message)): ?>
<p class="error-message">
    <?=$message?>
</p>
<? endif; ?>

<div class="gallery">

    <? foreach ($images as $image): ?>
        <div class="photo"><a href="<?='../image/' . $image['idx']?>" target="blank">
            <img src="<?='../' . THUMB_DIR . '/' . $image['filename']?>" width="150" height="100" />
        <div id="likes-count_<?=$image['idx']?>" class="likes-count"><?=$image['likes']?></div></a>
        <input id="lucas" data-id="<?=$image['idx']?>" class="like" type="submit" value=""/></div>

<? endforeach; ?>
</div>

<form method="POST" enctype="multipart/form-data" class="load">
            <p>Загрузить новое изображение в галерею:</p>
            <input type="text" name="describe" placeholder="Добавить описание изображения">Добавить описание изображения<br>
            <input type="text" name="price" placeholder="Цена лота">Цена лота<br>
            <input type="file" name="new-file"><br>
            <input type="submit" value="Загрузить" name="upload">
        </form>

