
function getDataVoterById(Id)
{
    
    $.ajax({
            url: "../libs/scriptsAJAX/getDataVoter.php",
            type: "POST",
            data: {Id:Id},
            dataType: "html",
            async:false,
            success: function(data)
            {  alert(data)
                data=data.split(":")
                $("#txtVoterId").val(data[0]);
                $("#txtDocumentNumber").val(data[0]);
                $("#txtName").val(data[1]);
                $("#txtLastName").val(data[2]);
                $("#txtPhone").val(data[3]);
                $("#txtAddress").val(data[4]); 
                $("#cboDepartament").val(data[5]);
                $("#cboCity").val(data[6]);
                $('#cboCity').trigger('change');
                $("#cboCommune").val(data[7]);
                $('#cboCommune').trigger('change');
                $("#cboNeighborhood").val(data[8]);
                $('#cboNeighborhood').trigger('change');
                $("#cboVotingStation").val(data[9]);
                
                $("#txtTableNumber").val(data[10]); 
               $("#cboVotingStation").val(data[9]);

            }
    });
    
    
    $('#lkInformation').trigger('click');
    
}






function saveVoter() 
{
    if($("#txtTableNumber").val()!='' && $("#CboVotingStationNeighborhood").val()!='-1' &&  $("#txtDocumentNumber").val()!='' &&  $("#txtLastName").val()!='' &&  $("#txtName").val()!='')
    {
       document.forms['FrmVoter'].action='../libs/processAdmin/saveVoter.php';
       document.forms['FrmVoter'].submit(); 
    }else
        alert("Debe seleccionar el puesto de votación, barrio, comuna, ciudad, cedula, nombres, apellidos y número de mesa")
} 


