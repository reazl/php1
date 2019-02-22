$(document).ready(function(){

    $(".like").on('click', function(){
        var id = $('#lucas').data("id");

        $.ajax({
            url: "/image/",
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
