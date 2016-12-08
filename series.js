/*Event listener pour accèder à la page d'informations via un click sur l'image de la série*/
function buildEventListener() {
    var imgCell = document.getElementsByClassName("imageCell");
    console.log(imgCell.length);

    var getInfos = function () {
        console.log("infos.php?name=" + this[0].id);
    };

    for (var i = 0; i < imgCell.length; i++) {
        imgCell[i].addEventListener('click', getInfos);
    }
}




/*Fonction chargeant les données JSON*/
function loadJSONDoc(url,arg){
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

            if (arg == "grid") {
                makeGrid(jsonObject);
            }
            else if (arg == "infos"){
                buildInfos(jsonObject);
            }
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

            /*Création de la zone d'affichage de l'image de la série*/
            var divImg = document.createElement("div");
            divImg.className = "imageCell";
            divImg.id = series[j].id;
            var img = document.createElement("img");
            var imgPath = "https://image.tmdb.org/t/p/w154"+series[j].poster_path;
            img.setAttribute('src', imgPath);
            img.setAttribute('alt', 'poster');
            divImg.appendChild(img);
            td.appendChild(divImg);

            /*Ajout d'un event listener pour accèder à la page sur les infos de la série en cliquant sur l'image*/
            divImg.addEventListener("click",function(){
                document.location.href = "infos.php?serie="+this.id;
            });

            /*Création de la zone "infos" sous l'image de la série (on peut rajouter plus d'infos plus tard)*/
            var divInfos = document.createElement("div");
            divInfos.className = "infosCell";
            var name = document.createTextNode(series[j].name);
            divInfos.appendChild(name);
            td.appendChild(divInfos);
        }

    }
}

/*Fonction construisant la page d'informations sur les séries*/
function buildInfos(content){
    var series = content.series;

    /*On récupère les div où on va afficher les infos*/
    var divImg=document.getElementById('imageInfos');
    var ulInfos=document.getElementById('listInfos');

    /*Création de l'image*/
    var img=document.createElement('img');
    var imgPath= "https://image.tmdb.org/t/p/w342"+series[0].poster_path;
    img.setAttribute('src', imgPath);
    img.setAttribute('alt', 'poster');
    divImg.appendChild(img);

    /*Ajout du titre de la série*/
    var h2Name = document.getElementById('nameSerie');
    var name = document.createTextNode(series[0].name);
    h2Name.appendChild(name);

    /*Création des informations de la série (on peut en rajouter plus tard)*/
    var liOverview = document.createElement('li');
    var span = document.createElement('span');
    var spanText = document.createTextNode('Overview: ');
    span.appendChild(spanText);
    var overview = document.createTextNode(series[0].overview);
    liOverview.appendChild(span);
    liOverview.appendChild(overview);
    ulInfos.appendChild(liOverview);

/* Exemple d'infos pertinentes présentes dans la base de données :
    first_air_date
    last_air_date
    number_of_episodes
    number_of_seasons
    original_language
    original_name
    name
    overview
*/

}
