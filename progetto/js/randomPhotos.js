$(document).ready(function(){
  var finalArray = choosePictures();
  for(var i = 1; i <= finalArray.length; i++){
    $("#photo"+i).attr("src", "images/image" + finalArray[i-1] + ".jpg");
  }  
});

function choosePictures(){
  var go = 0;
  var array = [0,0,0,0,0];
  var random = Math.floor((Math.random() * 9) + 1);
  for(var i = 0; i < array.length; i++){
    if((random + i) > 9){
      array[i] = (random + i) % 9;
    }
    else{
      array[i] = random + i;
    }
  }
  return array;
}