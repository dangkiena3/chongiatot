$(function () {
    //Update Message...
    $(".add_comment").click(function () {

        if ($("#content").val() == '') {
            alert("Xin vui lòng nhập nội dung bình luận");
        } else {
            $("#flash").show();
            $("#flash").fadeIn(400).html('<img src="{$template_path}/ajax_comment.gif" align="absmiddle"> <span class="loading">Đang tải bàn luận...</span>');

            $.ajax({
                type: "POST",
                url: "/jquery/vmarket_add_comment.php",
				dataType:"html",
                data: $("#frbinhluan").serialize(),
                cache: false,
                success: function (html) {
                    $("ul#list_cmt").append(html);
                    $("ul#list_cmt li:last").slideDown("slow");
                    document.getElementById('content').value = '';
                    document.getElementById('content').focus();
                    $("#flash").hide();
                }
            });
        }
        return false;
    });

    //Delete Message..

    $('.del_comment').live("click", function () {
        var ID = $(this).attr("id");
        var dataString = 'cmt_id=' + ID;
        if (confirm("Bạn có muốn xóa bàn luận này không?")) {

            $.ajax({
                type: "POST",
                url: "/jquery/del_comment.php",
                data: dataString,
                cache: false,
                success: function (html) {
                    $(".list_cmt" + ID).slideUp('300', function () {
                        $(this).remove();
                    });
                }
            });

        }
        return false;
    });

});