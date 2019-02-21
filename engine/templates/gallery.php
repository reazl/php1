<h1>Фотогалерея</h1>
<? if(!empty($message)): ?>
<p class="error-message">
    <?=$message?>
</p>
<? endif; ?>

<div class="gallery">

    <? foreach ($images as $image): ?>
        <div class="photo"><a rel="gallery" href="<?='../' . ORIGINALS_DIR . '/' . $image['filename']?>" target="blank">
            <img src="<?='../' . THUMB_DIR . '/' . $image['filename']?>" width="150" height="100" />
        <div id="likes-count" class="likes-count"><?=$image['likes']?></div></a>
        <input id="lucas" data-id="<?=$image['idx']?>" class="like" type="submit" value=""/></div>

<? endforeach; ?>
</div>

<form method="POST" enctype="multipart/form-data">
            <p>Загрузить новое изображение в галерею:</p>
            <input type="file" name="new-file">
            <input type="submit" value="Загрузить" name="upload">
        </form>

<script>
    $(document).ready(function(){
        $(".like").on('click', function(){
            let id = $(this).data("id");
            
            $.ajax({
                url: "/addlike/",
                type: "POST",
                dataType : "text",
                data:{
                    id: id,
                },
                error: function() {console.log(id);},
                success: function(answer){
                    console.log("done");
                    $('#likes-count').html(answer.likes);
                }

            })
        });

    });
</script>