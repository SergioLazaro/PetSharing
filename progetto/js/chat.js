$(document).ready(function(){
    var user = $('#receiver').val();
    var check = "check";
    $.ajax({
        type: 'POST',
        url: 'check-message.php',
        data: {
            'check': check,
            'user': user
        },
        success: function(msg){
            $('.chat-block').html(msg);
        }
    });
});

function addMessage(){
    var user = $('#receiver').val();
    var message = $('#message').val();
    //Doing post petition and populate the window again
    $.ajax({
        type: 'POST',
        url: 'check-message.php',
        data: {
            'user': user,
            'message': message
        },
        success: function(msg){
            $('.chat-block').html(msg);
        }
    });
    //Restarting the textarea field
    $('#message').attr("required",false);
    $('#message').val("");    //Clear textarea value
    $('#message').attr("required",true);
  
}