$(function() {
    $("#send").click(function(){
        var author = $("#author").val();
        var comment = $("#comment").val();
        $.ajax({
            type: "POST",
            url: "sendComment.php",
            data: {"author": author, "comment": comment},
            cache: false,
            success: function(response){
                var commentResp = new Array('Ваш комментарий отправлен', 'Комментарий не отправлен Ошибка базы данных', 'Нельзя отправлять пустой комментарий');
                var resultStat = commentResp[Number(response)];
                if(response == 0){
                    $("#author").val("");
                    $("#comment").val("");
                    $("#commentBlock").append("<div class='comment'>Автор: <strong>"+author+"</strong><br>"+comment+"</div>");}
                    $("#resp").text(resultStat).show().delay(1500).fadeOut(800);
            }
        });
        return false;
    });
});