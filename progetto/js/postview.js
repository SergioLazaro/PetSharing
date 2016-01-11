$(document).ready(function(){
    $('.redirection').on('click',function(){
        var num = $(this).attr("id");
        var form = $('#form' + num);
        form.submit();
    });
});

$(document).ready(function(){
    var user = $('#e1').val();
    var postid = $('#e2').val();
    $.ajax({
        type: 'POST',
        url: 'check-message.php',
        data: {
            'postid': postid,
            'user': user
        },
        success: function(msg){
            $('#comments').html(msg);
        }
    });
});
function addComment(){
    var user = $('#e1').val();
    var postid = $('#e2').val();
    var comment = $('#e3').val();
    $.ajax({
        type: 'POST',
        url: 'check-message.php',
        data: {
            'postid': postid,
            'user': user,
            'comment': comment
        },
        success: function(msg){
            $('#comments').html(msg);
        }
    });
}      