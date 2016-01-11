$(document).ready(function(){
    $('.post-block').on('click',function(){
        var num = $(this).attr("id");
        var form = $('#form' + num);
        form.submit();
    });
});
$(document).ready(function(){
    document.getElementById('pets').style.display = 'block';
    document.getElementById('carers').style.display = 'none';
    $('#selector').on('change',function(){
        if($('#selector option:selected').text() == "Pets"){ //check if pets...
            document.getElementById('pets').style.display = 'block';
            document.getElementById('carers').style.display = 'none';
        }
        else{   //If not, carers...
            document.getElementById('pets').style.display = 'none';
            document.getElementById('carers').style.display = 'block';
        }
    });
});