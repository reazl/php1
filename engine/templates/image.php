<h1>Фотогалерея</h1>

<div class="photo">
            <img src="<?='../' . THUMB_DIR . '/' . $image?>" width="150" height="100" />
        <div id="likes-count_<?=$id?>" class="likes-count"><?=$likes?></div>
<input id="lucas" data-id="<?=$id?>" class="like" type="submit" value=""/></div>

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
