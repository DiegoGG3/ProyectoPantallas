window.addEventListener("load",function(){

    next();
});

function next() {

    fetch('api/carga.php')
        .then(response => response.json())
        .then(data => {
            generarContenido(data);
            setTimeout(() => {
                console.log(data);

                next();
            }, (data.duracion)*1000);
        });
}

function generarContenido(texto){

    switch(texto.tipo){
        case "Web":
            document.getElementById("contenido").innerHTML=texto.url;
            break;
        case "Imagen":
            while (document.getElementById("contenido").firstChild) {
                document.getElementById("contenido").removeChild(document.getElementById("contenido").firstChild);
            }
            var recurso=document.createElement("img");
            recurso.setAttribute("src",texto.url);
            recurso.setAttribute("width","100%");
            recurso.setAttribute("height","100%");
            document.getElementById("contenido").appendChild(recurso);
            break;
        case "Video":
            while (document.getElementById("contenido").firstChild) {
                document.getElementById("contenido").removeChild(document.getElementById("contenido").firstChild);
            }
            var recurso=document.createElement("video");
            recurso.setAttribute("width","100%");
            recurso.setAttribute("height","100%");
            recurso.setAttribute("src",texto.url);
            var formato="video/mp4";
            recurso.setAttribute("type",formato);

            document.getElementById("contenido").appendChild(recurso);
            
            recurso.addEventListener("ended", function() {
                recurso.currentTime = 0;
                recurso.muted=true;
                recurso.play();
            });
            recurso.muted=true;
            recurso.play();
            

            break;
    }
}