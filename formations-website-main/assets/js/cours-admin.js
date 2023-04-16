var nbSections = 0;
var nbSubSections = Array(100).fill(0);
var idUser;
var idCours;

$('#btnAjoutSection').click(function(){
    
    nbSections++;
    
    $('#sections').append( 
        '\
        <div class="section" id="section'+ nbSections +'">\
            <div class="div-part-tab">\
                <h3 class="table-part" id="editable'+ nbSections +'">Nom de la section</h3>\
                <button type="button" class="btn btn-full edit-btn table-part removable" id="btnEditSection" value="' + nbSections + '"><i class="fa fa-pen"></i></button>\
            </div>\
            <div id="annonces'+ nbSections +'">\
            </div>\
            <div id="fichiers'+ nbSections +'">\
            </div>\
            <button type="button" class="btn btn-full btn-secondary btnAjoutAnnonce btn-cap removable" value="'+ nbSections +'">Ajouter une Annonce</button>\
            <button type="button" class="btn btn-full btn-secondary btnAjoutFichier btn-cap removable" class="btnAjoutFichier" value="'+ nbSections +'"">Ajouter un fichier</button>\
            <button type="button" class="btn btn-full btnSupSect removable" value="' + nbSections +'"><i class="fa fa-trash"></i></button>\
        </div>\
        ');    
});

$(document).on('click', '.btnAjoutAnnonce', function()
{
    let valBout = $(this).attr('value');
    nbSubSections[valBout]++;
    let currentSub = nbSubSections[valBout];

    $('#annonces'+valBout).append(
        '\
        <div class="div-annonces counter'+valBout+'">\
            <div class="div-part-tab">\
                <h3 class="table-part" id="editable'+ valBout + '-' + currentSub +'">Titre de l\'annonce</h3>\
                <button type="button" class="btn btn-full edit-btn table-part removable" id="btnEditAnnonce" value="' + valBout + '-' + currentSub + '"><i class="fa fa-pen"></i></button>\
            </div>\
            <div class="div-part-tab">\
                <p class="table-part rtr-ligne" id="editable'+ valBout + '-' + currentSub +'ann">Contenu de l\'annonce</p>\
                <button type="button" style="margin-top: 20px" class="btn btn-full edit-btn table-part removable" value="' + valBout + '-' + currentSub + 'ann"><i class="fa fa-pen"></i></button>\
            </div>\
        </div>\
    ');
});

$(document).on('click', '.btnAjoutFichier', function()
{
    let valBout = $(this).attr('value');
    nbSubSections[valBout]++;
    let currentSub = nbSubSections[valBout];
    
    $('#fichiers'+$(this).attr('value')).append(
        '\
        <div class="div-fichier counter'+valBout+'">\
            <div style="margin-top: 30px" class="div-part-tab">\
                <h3 class="table-part" id="editable'+ valBout + '-' + currentSub +'">Description du fichier</h3>\
                <button type="button" class="btn btn-full edit-btn table-part removable" id="btnEditAnnonce" value="' + valBout + '-' + currentSub + '"><i class="fa fa-pen"></i></button>\
            </div>\
            <input style="margin-top: 20px" class="files removable" type="file" id="myFile'+ valBout + '-' + currentSub +'" name="filename" onchange="showlink('+ valBout + ',' + currentSub +')">\
            <a class="linkFichier" id="ref'+ valBout + '-' + currentSub +'" href=""><a>\
        </div>\
    ');
});

$(document).on('click', '.edit-btn', function() {
    var textEntered = "";

    while(textEntered === "")
        textEntered = prompt("Votre texte: ");

    $('#editable'+$(this).attr('value')).text(textEntered);
});

$(document).on('click', '.btnSupSect', function()
{
    $('#section'+$(this).attr('value')).remove();
});

function transfer(idu,idc){
    idUser = idu;
    idCours = idc;
}

function send(){
    var filecount = 0;
    var FData = new FormData();
    var urls = ['/controllers/coursBDD.php','../../../controllers/coursBDD.php'];

    const pathArray = window.location.pathname.split( '/' );
    let uri = ""

    pathArray.length = pathArray.length - 2
    pathArray.forEach((element, index) => {
        uri += element
        if (index != pathArray.length - 1 ) {
            uri += "/"
        }
    })

    $(".files").each(function(i) {
        FData.append('file'+filecount,$(this)[0].files[0]);
        filecount++;
    });
    FData.append("Dom1",$("html").html());
    $('.removable').remove();
    FData.append("Dom2",$("html").html());
    FData.append("idUtilisateur",idUser);
    FData.append("uidCours",idCours);
    FData.append("NbFiles",filecount);
    FData.append("titre",$("#editable0").text());
    $.each(urls, function(i, u){
        $.ajax(window.location.origin + uri + u, {
            type: "POST",
            processData: false,
            contentType: false,
            async: false,
            data: FData,
            success: function (data) {}
        }).done(function() {
            // const pathArray = window.location.pathname.split( '/' );
            // let uri = ""
            //
            // pathArray.length = pathArray.length - 2
            // pathArray.forEach((element) => {
            //     uri += element +"/"
            // })
            // if(pathArray.includes('data')) {
            //     window.location.replace(window.location.origin + uri + idCours + '/cours-admin-prof.php');
            // } else {
            //     window.location.replace(window.location.origin + uri + 'data/COURS/' + idCours + '/cours-admin-prof.php');
            // }
        });
    });
}

function onLoad() {
    nbSections = document.getElementsByClassName("section").length;

    for(let i = 1; i < nbSections; i++)
    {
        nbSubSections[i] = document.getElementsByClassName("counter" + i);
    }
}

function showlink(attr1,attr2) {
    var name = document.getElementById('myFile' + attr1 + "-" + attr2); 
    var baliseA = document.getElementById('ref' + attr1 + "-" + attr2);
    baliseA.text = name.files.item(0).name;

    const pathArray = window.location.pathname.split( '/' );
    let uri = ""

    pathArray.length = pathArray.length - 2
    pathArray.forEach((element) => {
        uri += element +"/"
    })
    if(pathArray.includes('data')) {
        baliseA.setAttribute("href",window.location.origin + uri + idCours + '/' + name.files.item(0).name);
    } else {
        baliseA.setAttribute("href",window.location.origin + uri + 'data/COURS/' + idCours + '/' + name.files.item(0).name);
    }
}


