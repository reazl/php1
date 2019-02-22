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

<form method="POST" enctype="multipart/form-data">
            <p>Загрузить новое изображение в галерею:</p>
            <input type="file" name="new-file">
            <input type="submit" value="Загрузить" name="upload">
        </form>

<script>
    $(document).ready(function(){

        $(".like").on('click', function(){
            var id = $(this).data("id");

            $.ajax({
                url: "/addlike/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function(answer) {console.log(answer);
                console.log("ajax error");},
                success: function(answer){
                    console.log(answer);
                    $('#likes-count_'+id).html(answer.likes);
                }

            })
        });

    });
</script>