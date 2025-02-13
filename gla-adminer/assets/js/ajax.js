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

    load : function(url,data,callback){

        var xhr = this.init();
        if(!xhr||!url) return;
        if (xhr.overrideMimeType) xhr.overrideMimeType('text/xml');

        var formData = new FormData();

        for(var i in data){
            formData.append(i, data[i]);
        }


        xhr.upload.addEventListener("progress", function(e) {
            var per = (e.loaded / e.total) * 100;
            Q('#loadBox').style.display = 'inline-block';
            Q('#loadBox .l-prc').innerHTML = Math.round(per)+' %';
        }, true);

        xhr.open('POST', WEBROOT+'gla-adminer/control/ajax/'+url+'.php', true);

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

function loadAlbumImg(e,id){

    var I = e.files;

    ajax.load('loadAlbumImg',{'id':id,'img':I[0]}, function(data){

        Q('#loadBox').innerHTML = "Chargement effectuer avec success";

    });

}