/*Fonction chargeant les données JSON*/
function loadJSONDoc(url){
    // Create XMLHttpRequest object (Check browser)
    var xmlhttp;
    if (window.XMLHttpRequest){
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else{
        // code for IE5 and IE6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    // Things to do when a response arrives
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            // Change div content to the text content of the response
            var jsonObject = JSON.parse(xmlhttp.responseText);

            makeGrid(jsonObject);
        }
    }

    // Initialize request
    xmlhttp.open("GET", url, true);
    // Send
    xmlhttp.send();
}

/*Fonction construisant la grille*/
function makeGrid(content){
    var table = document.getElementById("grid");

    var series = content.series;

    /*Boucle pour les lignes*/
    for (var i = 0; i < series.length; i+=4){
        var tr = document.createElement("tr");
        table.children[0].appendChild(tr);

        /*Boucle pour les séries sur une ligne*/
        for (var j = i; j < i+4; j++){
            /*Série n°j*/
            var td = document.createElement("td");
            tr.appendChild(td);

            var divImg = document.createElement("div");
            divImg.className = "imageCell";
            divImg.id = series[j].id;
            var img = document.createElement("img");
            var imgPath = "https://image.tmdb.org/t/p/w154"+series[j].poster_path;
            img.setAttribute('src', imgPath);
            img.setAttribute('alt', 'poster');
            divImg.appendChild(img);
            td.appendChild(divImg);

            var divInfos = document.createElement("div");
            divInfos.className = "infosCell";
            var name = document.createTextNode(series[j].name);
            divInfos.appendChild(name);
            td.appendChild(divInfos);
        }

    }

}
