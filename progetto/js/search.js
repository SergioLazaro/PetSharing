$(document).ready(function(){
    $('.post-block').on('click',function(){
    	var num = $(this).attr("id");
        var form = $('#form' + num);
        form.submit();
    });
    $('.user-block').on('click',function(){
    	var num = $(this).attr("id");
        var form = $('#form' + num);
        form.submit();
    });
});