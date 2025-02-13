function _(x){return document.querySelector(x);}
function Q(x){return document.querySelectorAll(x);}

var webroot = location.protocol + '//' + window.location.host +'/Ebricodom/';

var config = {

    'url': webroot,
    'loader': webroot+'gla-adminer/assets/image/loader.gif'

}

if(NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function(callback){
        [].forEach.call(this, callback);
    }
}

var account_ajax = {

    getObj : function(){

        var xhr = false;

        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        }

        return xhr;

    },

    load : function(url,data,callback,load){

        var xhr = this.init();
        if(!xhr||!url) return;
        if (xhr.overrideMimeType) xhr.overrideMimeType('text/plain');

        var formData = new FormData();

        for(var i in data){
            formData.append(i, data[i]);
        }

        if(load){

            loadBox();

            xhr.upload.addEventListener("progress", function(e) {
                var per = (e.loaded / e.total) * 100;
                _('#PR #PRB').style.width = Math.round(per)+'%';
                _('#PR #PRB #PRP').innerHTML = Math.round(per)+' %';
                _('#TSZ').innerHTML = Math.round(e.total / 1024);
            }, true);

        }

        xhr.open('POST', config.url+'theme/control/ajax/'+url+'.php', true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                var result = "";
                if(xhr.responseText) result = xhr.responseText;

                if(callback) callback(result);

            } else {

                return false;

            }
        }

        xhr.send(formData);

    },

    init : function() {return this.getObj();}

}

function profileImgLoad(e){

    loader = document.querySelector('#loader')

    img = document.createElement('img')
    img.src = config.loader

    loader.innerHTML = 'Chargement de la photo en cours';
    loader.appendChild(img);

    var I = e.files;

    account_ajax.load('photoImgLoad',{'image':I[0]}, function(data){

        if(data !== 'error'){

            loader.outerHTML = "<p class='succes'>100% (Image chargé)</p>"

            window.location.reload()

        }else{

            alert("Erreur, Veuillez vérifier votre image, si elle est valide et si elle ne dépasse pas 2Mo.");

        }

    },false);

}



function delPics(e, id){

    account_ajax.load('delPic',{'id':id}, function(data){

        if(data == 'GLAoK'){

            alert("Photo supprimé")

            e.parentNode.style.display = "none"

        }

    },false);

}
