function _(x){return document.getElementById(x);}
function Q(x){return document.querySelector(x);}

var webroot = location.protocol+'//'+window.location.host+'/';

var config = {

    'url': webroot,
    'loader': webroot+'gla-adminer/assets/image/loader.gif'

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
        if (xhr.overrideMimeType) xhr.overrideMimeType('text/xml');

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

function save(id, table, e){

    e.style.opacity = 0.4;

    //e.removeAttribute("onclick");

    var text = Q('#'+ table +'-'+ id).value;

    ajax.load('saveText', { 'text': text, 'id': id, 'table': table}, function(data){

        if(data == 'GLAoK'){

            e.style.opacity = 1;
            //e.setAttribute("onclick","save("+id+", this)");

        }

    },false);

}