
function getDataUserByIndex(index, userId)
{
    $("#txtUserId").val(userId);
    $.ajax({
            url: "../libs/scriptsAJAX/getDataUserByIndex.php",
            type: "POST",
            data: {userId:userId},
            dataType: "html",
            async:false,
            success: function(data)
            {  
                data=data.split(":")
                $("#cboUserProfile").val(data[4]);
                $("#txtDocumentNumber").val(data[0]);
                $("#txtDocumentNumberId").val(data[0]);
                $("#txtName").val(data[1]);
                $("#txtLastName").val(data[2]);
                $("#txtCellPhone").val(data[3]);    
               

            }
    });
    
    
    $('#lkInformation').trigger('click');
    
}
function getDataCommune(Id)
{
 
    $.ajax({
            url: "../libs/scriptsAJAX/getDataCommune.php",
            type: "POST",
            data: {id:Id},
            dataType: "html",
            async:false,
            success: function(data)
            {  alert(data)
                data=data.split(":")
                $("#txtCommuneId").val(data[0]);
                $("#txtName").val(data[1]);
                $("#cboDepartament").val(data[3]);
                $("#cboCity").val(data[2]);
                
               

            }
    });
    
    
    $('#lkInformation').trigger('click');
    
}

function getDataNeighborhood(Id)
{
 
    $.ajax({
            url: "../libs/scriptsAJAX/getDataNeighborhood.php",
            type: "POST",
            data: {id:Id},
            dataType: "html",
            async:false,
            success: function(data)
            {  
                data=data.split(":")
                $("#txtNeighborhoodId").val(data[0]);
                $("#txtNameNeighborhood").val(data[2]);
                $("#cboDepartamentNeighborhood").val(data[4]);
                $("#cboCityNeighborhood").val(data[3]);
                $("#cboCommune").val(data[1]);       
               
            }
    });
    
    
    $('#lkInformationB').trigger('click');
    
}

function getDataVotingStation(Id)
{
    
    $.ajax({
            url: "../libs/scriptsAJAX/getDataVotingStation.php",
            type: "POST",
            data: {id:Id},
            dataType: "html",
            async:false,
            success: function(data)
            {  
                data=data.split(":")
                $("#txtVotingStationId").val(data[0]);
                $("#txtName").val(data[1]);
                $("#txtAddress").val(data[2]);
                $("#cboDepartament").val(data[4]);
                $("#cboCity").val(data[3]);
                $("#cboCommune").val(data[5]);
                $("#cboNeighborhood").val(data[6]);
                
                
               

            }
    });
    
    
    $('#lkInformation').trigger('click');
    
}

function saveUser()
{
    if($("#txtPassword").val()== $("#txtPasswordAgaint").val())
    {
       document.forms['FrmUser'].action='../libs/processAdmin/saveUser.php';
       document.forms['FrmUser'].submit(); 
    }
    else
    {
        alert("La contraseña y la confirmación no coinciden");
        $("#txtConfPassword").val()
        $("#txtConfPassword").focus();
    }
} 
function saveVotingStation()
{
    document.forms['FrmVotingStation'].action='../libs/processAdmin/saveVotingStation.php';
    document.forms['FrmVotingStation'].submit(); 
}

function saveCommune()
{
    document.forms['FrmCommune'].action='../libs/processAdmin/saveCommune.php';
    document.forms['FrmCommune'].submit(); 
}

function saveNeighborhood()
{
    document.forms['FrmNeighborhood'].action='../libs/processAdmin/saveNeighborhood.php';
    document.forms['FrmNeighborhood'].submit(); 
}



function editUser()
{
    if($("#txtPassword").val()== $("#txtConfPassword").val())
    {
       document.forms['FrmUser'].action='../libs/processAdmin/EditUser.php';
       document.forms['FrmUser'].submit(); 
    }
    else
    {
        alert("La contraseña y la confirmación no coinciden");
        $("#txtConfPassword").val()
        $("#txtConfPassword").focus();
    }
}

function saveUserServices()
{
    if($("#cboUserToServices").val()!= '' && $("#cboUserToServices").val()!= '-1')
    {
       document.forms['FrmUserServices'].action='../libs/processAdmin/saveUserServices.php';
       document.forms['FrmUserServices'].submit(); 
    }
    else
    {
        alert("Debe Seleccionar un usuario");
    }
}
