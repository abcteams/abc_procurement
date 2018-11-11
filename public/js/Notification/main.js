
function gotoLink(id){

    CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var data = {};
    data['not_id']   =   $("#notification_id").val();

    $.ajax({
        type: "POST",
        url: 'readStatus',
        data:{_token: CSRF_TOKEN,'data':data},
        success: function(data) {
            window.location = id;
        }
    });
}