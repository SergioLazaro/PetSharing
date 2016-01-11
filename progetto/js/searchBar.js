$(document).ready(function(){
   $('#search-bar').keyup(function(event){
        if(event.which == 13){  //Check if user push 'enter'
            document.myform.submit();
        }
    }); 
});