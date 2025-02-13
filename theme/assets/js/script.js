function _(x){ return document.querySelector(x)}

var webroot = 'https://www.ebricodom.dz/'

if(NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function(callback){
        [].forEach.call(this, callback);
    }
}


// ----- Slider

var slider = function(childs, slide, time, cw){

    var img = document.querySelectorAll(childs)
    var slider = _(slide);

    if(!time) time = 4000;

    var opt = {

        t : (time * 1000),
        w : cw.innerWidth || cw.clientWidth,
        h : cw.innerHeight || cw.clientHeight

    }

    slider.style.width = (img.length * opt.w)+'px';


    for(var i = 0;i < img.length; i++){

        img[i].style.width = opt.w+'px';
        img[i].style.height = opt.h+'px';

    }

    var j = 1;

    var fade = function(){

        if(j >= (img.length)){

            j = 0;

        }

        slider.style.transform = 'translateX(-'+(j * opt.w)+'px)';

        slider.classList.toggle('anim');

        j++;

    }

    if(_('#nx') !== 'null'){

        _('#nx').addEventListener('click',function(){
            j++;

            if(j >= (img.length)){

                j = 0;

            }

            slider.style.transform = 'translateX(-'+(j * opt.w)+'px)';

            clearTimeout(fade);

        });

    }

    if(_('#pv') !== 'null'){

        _('#pv').addEventListener('click',function(){

            if(j == 0){
                j = (img.length - 1);
            }else{
                j--;
            }

            slider.style.transform = 'translateX(-'+(j * opt.w)+'px)';

            clearTimeout(fade);

        });

    }

    setInterval(fade,opt.t);

}

var carousel = function(slide, time){

    var img = document.querySelectorAll(slide+' img')
    var slider = _(slide);

    if(!time) time = 4000;

    var opt = {

        t : (time * 1000),
        w : 300

    }

    slider.style.width = (img.length * opt.w)+'px';


    for(var i = 0;i < img.length; i++){

        img[i].style.width = opt.w+'px';

    }

    var j = 1;

    var fade = function(){

        if(j >= (img.length)){

            j = 0;

        }

        slider.style.transform = 'translateX(-'+(j * opt.w)+'px)';

        j++;

    }

    _('#nx').addEventListener('click',function(){
        j++;

        if(j >= (img.length)){

            j = 0;

        }

        slider.style.transform = 'translateX(-'+(j * opt.w)+'px)';

        clearTimeout(fade);

    });

    _('#pr').addEventListener('click',function(){

        if(j == 0){
            j = (img.length - 1);
        }else{
            j--;
        }

        slider.style.transform = 'translateX(-'+(j * opt.w)+'px)';

        clearTimeout(fade);

    });

    setInterval(fade,opt.t);

}

function change_1(t) {

    t.classList.add('active')

    document.querySelector('#besoin_1').innerHTML = "<option>Chargement ...</option>"
    document.querySelector('#besoin_1').setAttribute('disabled', 'true')
    document.querySelector('#besoin_1').classList.remove('active')

    const data = new FormData();
    data.append('value', t.value);

    fetch(webroot + 'theme/control/ajax/home_search_1.php', {
        method: "POST",
        header: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: data
    })
        .then(response => response.json())
        .then(function (result) {

            if (result.empty == true) {

                document.querySelector('#besoin_1').innerHTML = "<option>Aucune option</option>"

            } else {

                document.querySelector('#besoin_1').innerHTML = result.return
                document.querySelector('#besoin_1').removeAttribute('disabled')
                document.querySelector('#besoin_1').classList.add('active')

            }

        })

}

function change_2(t) {

    document.querySelector('#besoin_2').innerHTML = "<option>Chargement ...</option>"
    document.querySelector('#besoin_2').setAttribute('disabled', 'true')
    document.querySelector('#besoin_2').classList.remove('active')

    const data = new FormData();
    data.append('value', t.value);

    fetch(webroot + 'theme/control/ajax/home_search_2.php', {
        method: "POST",
        header: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: data
    })
        .then(response => response.json())
        .then(function (result) {

            if (result.empty == true) {

                document.querySelector('#besoin_2').innerHTML = "<option>Aucune option</option>"

            } else {

                document.querySelector('#besoin_2').innerHTML = result.return
                document.querySelector('#besoin_2').removeAttribute('disabled')
                document.querySelector('#besoin_2').classList.add('active')

            }

        })

}

document.addEventListener('DOMContentLoaded', function () {

    // Bouton haut
    up_btn = document.createElement('span')
    up_btn.classList.add('up_btn')
    up_btn.classList.add('bg3')
    up_btn.innerText = '<'
    up_btn.setAttribute("onclick", "window.scrollTo({top: 0, behavior: 'smooth'})")

    document.body.appendChild(up_btn)

})