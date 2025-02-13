if(NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function(callback){
        [].forEach.call(this, callback);
    }
}

var el = {

    t : encodeURIComponent(document.title),
    u : encodeURIComponent(document.baseURI),
    top : window.screenTop || window.screenY,
    left : window.screenLeft || window.screenX,
    w : window.innerWidth || document.documentElement.clientWidth,
    h : window.innerHeight || document.documentElement.clientHeight

}

var pp = {

    w : 640,
    h : 360,
    ptop : el.top + el.h / 2 - 360 / 2,
    pleft : el.left + el.w / 2 - 640 / 2

}

document.querySelectorAll('.shr').forEach(function(node){

    node.addEventListener('click',function(){

        switch (this.dataset.n){

            case 'fb': var uShare = "https://web.facebook.com/sharer.php?u="+el.u;break;

            case 'tw' : var uShare = "https://www.twitter.com/intent/tweet?text="+el.t+"&via=GlobalAdservice&url="+el.u;break;

            case 'gp' : var uShare = "https://plus.google.com/share?url="+el.u;break;

        }

        h = this.dataset.h || pp.h

        window.open(uShare,"Partage","scrollbars=yes, width="+pp.w+", height="+pp.h+", top="+pp.ptop+", left="+pp.pleft);

    })

});

var BD = document.querySelector('body');
var n;

function zoom(e,i){
    var mask = document.createElement('div');
    mask.className = 'mask';
    mask.id = 'mask';

    mask.innerHTML = '<img src="'+ e.src+'" onclick="removeEl(\'body #mask\')" id="img-zm"/>';

    var btn = document.createElement('div');
    btn.innerHTML = "<span class='btn btn-prev icon' onclick='prev()'>=</span> <span class='btn btn-next icon' onclick='next()'>=</span>"

    n = parseInt(e.dataset.id);

    var exit = document.createElement('span');
    exit.className = 'exit btn icon';
    exit.innerText = ')';
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