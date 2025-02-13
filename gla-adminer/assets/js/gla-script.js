function _(x){return document.getElementById(x);}
function Q(x){return document.querySelector(x);}
function QA(x){return document.querySelectorAll(x);}

var webroot = location.protocol + '//' + window.location.host +'/';

var config = {

    'url': webroot,
    'loader': webroot+'gla-adminer/assets/image/loader.gif'

}

if(NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function(callback){
        [].forEach.call(this, callback);
    }
}

var ajax = {

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
                Q('#PR #PRB').style.width = Math.round(per)+'%';
                Q('#PR #PRB #PRP').innerHTML = Math.round(per)+' %';
                Q('#TSZ').innerHTML = Math.round(e.total / 1024);
            }, true);

        }

        xhr.open('POST', config.url+'gla-adminer/control/ajax/'+url+'.php', true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {

                var result = "";
                if(xhr.responseText) result = xhr.responseText;

                if(callback) callback(result);

            } else {

                return 0;
            }
        }

        xhr.send(formData);

    },

    init : function() {return this.getObj();}

}

function loadBox(e){

    var mask = document.createElement('div');
        mask.classList.add('mask');
        mask.id = 'mask';

    var popup = document.createElement('div');
        popup.classList.add('popup');

    popup.innerHTML = "<h2><img src='"+config.loader+"' class='loader'/> Upload en cours</h2>"

    popup.innerHTML += "<div class='progress' id='PR'><div class='bar' id='PRB'><span id='PRP'>0 %</span></div></div>";

    popup.innerHTML += "<span class='size'>Taille de l'image <strong id='TSZ'>124</strong> Ko</span>";

    popup.innerHTML += "<span class='exit' onclick='document.body.removeChild(mask)'>x</span>";


    mask.appendChild(popup);
    document.body.appendChild(mask);

}

function galerieAddPics(e){

    var I = e.files;

    ajax.load('galerieAddPics',{'image':I[0]}, function(data){

        if(data == 'GLAoK') window.location.reload();

    },true);

}

function sliderAddPics(e){

    var I = e.files;

    ajax.load('sliderAddPics',{'image':I[0]}, function(data){

        if(data == 'GLAoK') window.location.reload();

    },true);

}

function catEditImage(e,id,imageName){

    var I = e.files;

    ajax.load('catEditImage',{'image':I[0],'id':id,'imagename':imageName}, function(data){

        if(data == 'GLAoK') window.location.reload();

    },true);

}

function galerieEditPics(e,id){

    var I = e.files;

    ajax.load('galerieEditPics',{'image':I[0],'id':id}, function(data){

        if(data == 'GLAoK') window.location.reload();

    },true);

}

function sliderEditPics(e,id){

    var I = e.files;

    ajax.load('sliderEditPics',{'image':I[0],'id':id}, function(data){

        if(data == 'GLAoK') window.location.reload();

    },true);

}

function ajaxLoader(f,d) {

    if (window.ActiveXObject) {
        try {
            var xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            var xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else if (window.XMLHttpRequest) {
        var xhr = new XMLHttpRequest();
    }


    xhr.upload.addEventListener("progress", function(e) {
        var per = (e.loaded / e.total) * 100;
        Q('#loadBox').style.display = 'inline-block';
        Q('#loadBox .l-prc').innerHTML = Math.round(per)+' %';
    }, true);

    xhr.open('POST', config.url+'gla-adminer/control/ajax/'+f+'.php', true);
    xhr.send(d);

    return xhr;
}

function loadImg(){

    P = _('btnLoad');
    I = _('imgFile').files;

    P.setAttribute('onclick','event.preventDefault()')
    P.style.opacity=0.5;

    var d = new FormData();
    d.append('img', I[0]);

    var xhr = ajaxLoader('loadImg',d);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if(xhr && xhr.responseText !== '' && xhr.responseText !== 'error'){
                Q('#loadBox').innerHTML = "Chargement effectuer avec success";
                Q('#imgName').value = xhr.responseText;

                P.removeAttribute('onclick');
                P.style.opacity=1;
            }
        }
    }
}

function loadCatImg(){

    P = _('btnLoad');
    I = _('imgFile').files;

    P.setAttribute('onclick','event.preventDefault()')
    P.style.opacity=0.5;

    var d = new FormData();
    d.append('img', I[0]);

    var xhr = ajaxLoader('loadCatImg',d);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if(xhr && xhr.responseText !== '' && xhr.responseText !== 'error'){
                Q('#loadBox').innerHTML = "Chargement effectuer avec success";
                Q('#imgName').value = xhr.responseText;

                P.removeAttribute('onclick');
                P.style.opacity=1;
            }
        }
    }
}

function loadCatImgFull(){

    P = _('btnLoad');
    I = _('imgFile').files;

    P.setAttribute('onclick','event.preventDefault()')
    P.style.opacity=0.5;

    var d = new FormData();
    d.append('img', I[0]);

    var xhr = ajaxLoader('loadCatImgFull',d);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if(xhr && xhr.responseText !== '' && xhr.responseText !== 'error'){
                Q('#loadBox').innerHTML = "Chargement effectuer avec success";
                Q('#imgName').value = xhr.responseText;

                P.removeAttribute('onclick');
                P.style.opacity=1;
            }
        }
    }
}

function editImg(){

    P = _('btnLoad');
    I = _('imgFile').files;
    iN = Q('#imgName').value;
    art_id = Q('#article_id').value;

    P.setAttribute('onclick','event.preventDefault()')
    P.style.opacity=0.5;

    var d = new FormData();
    d.append('imgname', iN);
    d.append('article_id', art_id);
    d.append('img', I[0]);

    var xhr = ajaxLoader('editImg',d);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if(xhr && xhr.responseText !== 'ok'){
                Q('#loadBox').innerHTML = "Image modifier avec success";

                P.removeAttribute('onclick');
                P.style.opacity=1;

                window.location.reload()
            }
        }
    }
}

function addMoreImg(id){

    I = _('imgFile').files;

    var d = new FormData();
    d.append('id', id);

    for(i = 0;i < I.length;i++){
        d.append('img'+i, I[i]);
    };

    var xhr = ajaxLoader('addMoreImg',d);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if(xhr && xhr.responseText == 'GLAoK'){
                Q('#loadBox').innerHTML = "Images ajoutés avec success";

                window.location.reload()
            }
        }
    }
}

// --------------------------------------------------------------------
// ------------------------ VALIDATION --------------------------------
// --------------------------------------------------------------------

var validation = {

    msg : null,
    nbr : null,
    condition : null,

    elements : function(e){
        return QA(e);
    },

    max : function(t,n,msgD){

        if(t > n){

            msgD.style.display='block';

        }else{

            msgD.style.display='none';

        }

    },

    min : function(t,n,msgD){

        if(t < n){

            msgD.style.display='block';

        }else{

            msgD.style.display='none';

        }

    },

    control : function(t,n,c,msgD){

        //console.log(this.condition);

        if(c == 'max'){

            validation.max(t,n,msgD);

        }else{

            validation.min(t,n,msgD);

        }

    },

    cElem : function(elem){

        var dd = document.createElement('p');
            dd.innerHTML = this.msg;
            dd.classList.add('remR');
            dd.style.display = 'none';

        elem.parentElement.insertBefore(dd,elem.nextSibling);

        return dd;

    },

    vars : function(elem){

        this.msg = elem.dataset.gla_msg;
        //this.nbr = elem.dataset.gla_value;
        //this.condition = elem.dataset.gla_condition;

    },


    validate : function(e){

        this.elements(e).forEach(function(elem){

            validation.vars(elem);

            var msgD = validation.cElem(elem);

            var nbr = elem.dataset.gla_value;
            var condition = elem.dataset.gla_condition;

            elem.addEventListener('keyup',function(e){

                validation.control(this.value.length,nbr,condition,msgD);

            })

        });

    }

}