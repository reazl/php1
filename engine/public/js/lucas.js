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
            error: function() {
                console.log("ajax error");},
            success: function(answer){
                $('#likes-count_'+id).html(answer.likes);

            }

        })

    });

});