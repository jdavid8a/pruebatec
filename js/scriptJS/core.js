function sendLogin()
{
   document.forms['FrmLogin'].action='libs/Login.php';
   document.submit();
    
}


function getSelectCity(value,div, control='')
{
    control=(control=='')?"cboCity":control;
    $.ajax({
            url: "../libs/scriptsAJAX/getCityByDepartament.php",
            type: "POST",
            data: {value:value,control:control},
            dataType: "html",
            async:false,
            success: function(data)
            {
                
                $("#"+div).empty();
                $("#"+div).html(data);

            }
    });
}


function getCommuneByCity(value,div, control='')
{
    control=(control=='')?"dvCbocommune":control;
    $.ajax({
            url: "../libs/scriptsAJAX/getCommuneByCity.php",
            type: "POST",
            data: {value:value,control:control},
            dataType: "html",
            async:false,
            success: function(data)
            {
                
                $("#"+div).empty();
                $("#"+div).html(data);

            }
    });
}

function getNeighborhoodByCommune(value,div, control='')
{
    control=(control=='')?"dvCboNeighborhood":control;
    $.ajax({
            url: "../libs/scriptsAJAX/getNeighborhoodByCommune.php",
            type: "POST",
            data: {value:value,control:control},
            dataType: "html",
            async:false,
            success: function(data)
            {
                
                $("#"+div).empty();
                $("#"+div).html(data);

            }
    });
}

function getVotingStationByNeighborhood(value,div, control='')
{
    control=(control=='')?"CboVotingStationNeighborhood":control;
    $.ajax({
            url: "../libs/scriptsAJAX/getVotingStationByNeighborhood.php",
            type: "POST",
            data: {value:value,control:control},
            dataType: "html",
            async:false,
            success: function(data)
            {
                
                $("#"+div).empty();
                $("#"+div).html(data);

            }
    });
}



function getDepartamentByCountry(value,div, control='')
{
    control=(control=='')?"cboCity":control;
    $.ajax({
            url: "../libs/scriptsAJAX/getDepartamentByCountry.php",
            type: "POST",
            data: {value:value,control:control},
            dataType: "html",
            async:false,
            success: function(data)
            {
                
                $("#"+div).empty();
                $("#"+div).html(data);

            }
    });
}

