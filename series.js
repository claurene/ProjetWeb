//Fonction chargeant les données JSON (pour la grille)
function loadGrid(url) {
    $.getJSON(url, function (result) {
        var table = $('#grid');
        var series = result['series'];
        //Boucle pour les lignes
        for (var i = 0; i < series.length; i+=4){
            //Boucle pour les séries sur une ligne
            var tr = $('<tr/>');
            tr.appendTo(table);
            for (var j = i; j < i+4; j++){
                //Série n°j
                var td = $('<td/>');
                td.appendTo(tr);

                //Création de la zone d'affichage de l'image de la série et du lien vers la page infos
                $('<img/>', {
                    id: series[j]['id'],
                    src: "https://image.tmdb.org/t/p/w154"+series[j]['poster_path'],
                    alt: 'poster'
                }).bind('click', function() {
                    document.location.href = "infos.php?serie="+$(this).attr('id');
                }).appendTo(td);

                //Création de la zone informations sous l'image de la série
                //TODO: à complèter avec d'autres informations
                td.append(
                    $('<div/>', {text: series[j]['name']})
                );
            }
        }
    });
}

function loadInfos(url) {
    $.getJSON(url, function (result) {
        var series = result['series'];

        //On affiche l'image de la série
        $('<img/>',{
            src: "https://image.tmdb.org/t/p/w342"+series[0]['poster_path'],
            alt: 'poster'
        }).appendTo($('#imageInfos'));

        //Ajout du titre de la série
        $('#nameSerie').append(series[0]['name']);

        //Ajout d'autres infos
        //TODO: à complèter avec d'autres infos
        $('#listInfos').append(
            $('<li/>').append(
                $('<span/>',{text: 'Overview: '}),
                series[0]['overview']
            )
        );
    });
}

function loadRegister(){
    $('#main').load('register.html');
}