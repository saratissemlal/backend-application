var BD = document.querySelector('body');
var n;

function zoom(e,i){
    var mask = document.createElement('div');
    mask.className = 'mask';
    mask.id = 'mask';

    mask.innerHTML = '<img src="'+ e.src+'" onclick="removeEl(\'body #mask\')" id="img-zm"/>';

    var btn = document.createElement('div');
    btn.innerHTML = "<span class='btn btn-prev' onclick='prev()'><</span> <span class='btn btn-next' onclick='next()'>></span>"

    //alert(e.classList);
    n = parseInt(e.dataset.id);

    //alert(n);

    var exit = document.createElement('span');
    exit.className = 'exit';
    exit.innerText = 'x';
    exit.setAttribute('onclick', "removeEl('body #mask')");

    mask.appendChild(exit);
    mask.appendChild(btn);

    BD.appendChild(mask);

}

function next(){

    img = document.querySelector('.img-n'+ (n + 1)).src;

    document.getElementById('img-zm').src = img;

    n = n+1;

}

function prev(){

    img = document.querySelector('.img-n'+ (n - 1)).src;

    document.getElementById('img-zm').src = img;

    n = n-1;

}

function removeEl(id) {
    var elem = document.querySelector(id);
    BD.removeChild(elem);
}
