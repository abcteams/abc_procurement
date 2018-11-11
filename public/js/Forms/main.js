function showAccept(){
    $('#supplierAccept').slideToggle('slow', function() {
        if ($('#supplierAccept').is(':hidden'))
        {
            $('#supplierDecline').slideDown();
            $("#acceptIcon").css('color','#6b5f5f');
            $("#declineIcon").css('color','#36bb36');
        }
        else
        {
            $('#supplierDecline').slideUp();
            $("#acceptIcon").css('color','#36bb36');
            $("#declineIcon").css('color','#6b5f5f');
        }
    });
}

function showDecline(){
    $('#supplierDecline').slideToggle('slow', function() {
        if ($('#supplierDecline').is(':hidden'))
        {
            $('#supplierAccept').slideDown();
            $("#declineIcon").css('color','#6b5f5f');
            $("#acceptIcon").css('color','#36bb36');
        }
        else
        {
            $('#supplierAccept').slideUp();
            $("#declineIcon").css('color','#36bb36');
            $("#acceptIcon").css('color','#6b5f5f');
        }
    });
}

function showAgreementDecline(){
    $('#agreementDecline').slideToggle('slow', function() {
    });
}


function uploadFile(boundry) {
    if(boundry.files[0] != undefined)
    {
        if(boundry.files[0].size > 10000000){
            boundry.value = ''
            swal({
                title: "The File Is Large",
                text: "This file is Large , Maximam size 10 Mb",
                icon: "warning",
                dangerMode: true,
            });
        }
    }
}