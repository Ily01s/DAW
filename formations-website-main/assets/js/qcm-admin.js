
var nbQuestion = 0;
var nbReponses = Array(100).fill(0);

$('#btnAjout').click(function(){
    
    nbQuestion++;
    
    $('#questions').append( 
        "\
            <div class='form-item flexQuestNum' id='grandDivQuest"+nbQuestion+"'>\
                <div class='form-label-wrap'>\
                    <label class='form-label flexQuestNum' for='question"+nbQuestion+"'>\
                        <span class='form-label-text flexQuestNum'>Question "+nbQuestion+"</span>\
                    </label>\
                </div>\
                <div class='form-input-wrap' >\
                    <input type='text' class='form-input flexQuestNum' name='question"+nbQuestion+"' id='question"+nbQuestion+"'\
                        autocomplete='off' autocapitalize='none' style='display: table;'>\
                </div>\
                <div class='flexQuestNum' id='reponseDiv"+nbQuestion+"'>\
                </div>\
                <button type='button' class='btn btn-full btn-secondary btnAjoutRep flexQuestNum' value='"+nbQuestion+"'>+</button>\
                <button type='button' class='btn btn-full btn-caution btnSupQuest flexQuestNum' value='"+nbQuestion+"'>Supprimer Question</button>\
            </div>\
    ");    
});

$(document).on('click', '.btnAjoutRep', function()
{
    nbReponses[$(this).attr('value')]++;

    $('#reponseDiv'+$(this).attr('value')).append( 
        "\
        <div class='flexRepNum' id='grandDivRep" + $(this).attr('value') + "-" + nbReponses[$(this).attr('value')] +"'>\
            <label class='form-label flexRepNum' for='reponse" + $(this).attr('value') + "-" + nbReponses[$(this).attr('value')] +"'>\
                <span class='form-label-text flexRepNum'>Reponse " + $(this).attr('value') + "-" + nbReponses[$(this).attr('value')] +"</span>\
            </label>\
            <div class='div-rep-tab'>\
                <div class='form-input-wrap-qcm' >\
                    <input type='text' class='form-input flexRepNum repLabel' name='reponse" + $(this).attr('value')+ "-" + nbReponses[$(this).attr('value')] + "' id='reponse" + $(this).attr('value')+ "-" + nbReponses[$(this).attr('value')] +"'\
                        autocomplete='off' autocapitalize='none'>\
                </div>\
                <button type='button' class='btn btn-full btnCheckRep flexRepNum' value='fausse" + $(this).attr('value')+ "-" + nbReponses[$(this).attr('value')] +"'><i class='fa fa-check'></i></button>\
                <input type='hidden' name='fausse"+$(this).attr('value')+ "-"+nbReponses[$(this).attr('value')]+"' value='fausse"+ $(this).attr('value')+ "-" + nbReponses[$(this).attr('value')] +"' />\
                <button type='button' class='btn btn-full btnSupRep flexRepNum' value='" + $(this).attr('value')+ "-" + nbReponses[$(this).attr('value')] +"'><i class='fa fa-trash'></i></button>\
            </div>\
        </div>\
    ");
});


$(document).on('click', '.btnSupQuest', function()
{
    nbQuestion--;
    for(let i = $(this).attr('value') - 1; i < nbReponses.length; i++)
    {
        nbReponses[i] = nbReponses[i + 1];
    }

    decrementByClass('flexQuestNum', $(this).attr('value'));

    $('#grandDivQuest'+$(this).attr('value')).remove();
});

$(document).on('click', '.btnSupRep', function()
{
    nbReponses[$(this).attr('value').substring(0, $(this).attr('value').indexOf('-'))]--;

    decrementByClass('flexRepNum', $(this).attr('value'));
    
    $('#grandDivRep'+$(this).attr('value')).remove();
});

$(document).on('click', '.btnCheckRep', function()
{
    if($(this).css('background-color') == "rgb(166, 166, 166)")
    {
        $(this).css("background-color", "#38cc74");
        $(this).attr("value", "juste" + $(this).attr("value").substring(6));
        $(this).next().attr("value",$(this).attr("value"));
        $(this).next().attr("name", $(this).attr("value"));
    }
    else
    {
        $(this).css("background-color", "rgb(166, 166, 166)");
        $(this).attr("value", "fausse" + $(this).attr("value").substring(5));
        $(this).next().attr("value",$(this).attr("value"));
        $(this).next().attr("name",$(this).attr("value"));
    }
});


function checkDecr(s_, numFrom, mode)
{
    var str = s_;
    var _ffix_ = "";

    if(str.includes('-'))
    {
        if(mode == 0)
        {
            str = str.substring(0, str.indexOf('-'));
            _ffix_ = s_.substring(s_.indexOf('-'));
        }
        else
        {
            
            str = str.substring(str.indexOf('-'));
            _ffix_ = s_.substring(0, s_.indexOf('-'));
        }
    }

    var elmNum = str.match(/\d+/g);

    if(elmNum > numFrom)
    {
        if(mode == 0)
            return str.replace(elmNum, elmNum-1) + _ffix_;
        else
            return _ffix_ + str.replace(elmNum, elmNum-1);
    }
    else
    {
        if(mode == 0)
            return str + _ffix_;
        else
            return _ffix_ + str;
    }
}

function decrementByClass(class_, numFrom)
{
    var elements;
    var mode;

    if(class_ === 'flexQuestNum')
    {
        elements = [...document.getElementsByClassName('flexQuestNum'), ...document.getElementsByClassName('flexRepNum')];
        mode = 0;
    }
    else
    {
        elements = document.getElementsByClassName('flexRepNum');
        mode = 1;
        numFrom = numFrom.substring(numFrom.indexOf('-')+1);
    }

    for(let i = 0; i < elements.length; i++)
    {
        var elmType = elements[i].tagName.toLowerCase();

        switch(elmType)
        {
            case 'div':
                elements[i].id = checkDecr(elements[i].id, numFrom, mode);
            break;
            case 'label':
                elements[i].setAttribute('for', checkDecr(elements[i].getAttribute('for'), numFrom, mode));
            break;
            case 'span':
                elements[i].textContent = checkDecr(elements[i].textContent, numFrom, mode);
            break;
            case 'input':
                elements[i].setAttribute('name', checkDecr(elements[i].getAttribute('name'), numFrom, mode));
                elements[i].id = checkDecr(elements[i].id, numFrom, mode);
            break;
            case 'button':
                elements[i].setAttribute('value', checkDecr(elements[i].getAttribute('value'), numFrom, mode));
            break;
        }
    }
}
