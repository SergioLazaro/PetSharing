window.onload = function() {
    document.getElementById('pettype').style.display = 'none';
    document.getElementById('comments').style.display = 'none';
    document.getElementById('name').style.display = 'none';
    document.getElementById('age').style.display = 'none';
    /*document.getElementById('photo').style.display = 'none';*/
    document.getElementById('button').style.display = 'none';
}
function check() {
    if (document.getElementById('petselected').checked) {
        document.getElementById('pettype').style.display = 'block';
        document.getElementById('comments').style.display = 'block';
        document.getElementById('name').style.display = 'block';
        document.getElementById('age').style.display = 'block';
        /*document.getElementById('photo').style.display = 'block';*/
        document.getElementById('button').style.display = 'block';
    } 
    else if(document.getElementById('carerselected').checked) {
        document.getElementById('pettype').style.display = 'block';
        document.getElementById('comments').style.display = 'block';
        document.getElementById('name').style.display = 'none';
        document.getElementById('age').style.display = 'none';
        /*document.getElementById('photo').style.display = 'block';*/
        document.getElementById('button').style.display = 'block';
   }
}


