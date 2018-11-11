$(function() {
    $('.select2').select2();
});

function delete_row(id){
    swal({
        title: "Are you sure?",
        text: "Are You sure you Want to Delete this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: 'removegml',
                    data:{'id':id},
                    success: function(data) {
                        if(data.length > 1)
                        {
                            swal({
                                title: "Worng",
                                text: data,
                                icon: "warning",
                                buttons: false,
                                dangerMode: true,
                            })

                        }else {
                            location.reload();
                        }

                    }
                });
            }
        });

}
function delete_sub(id,type){
    if(type == 1)
        var url    =   '../removesubgml';
    else
        var url    =   'removesubgml';

    swal({
        title: "Are you sure?",
        text: "Are You sure you Want to Delete this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: url,
                    data:{'id':id},
                    success: function(data) {
                        if(data.length > 1)
                        {
                            swal({
                                title: "Worng",
                                text: data,
                                icon: "warning",
                                buttons: false,
                                dangerMode: true,
                            })

                        }else {
                            location.reload();
                        }
                    }
                });
            }
        });

}

//****** iqbal work *********
function showDeleteModel(id){
    debugger;
    var UserId = id;
    $('#hidden').text(UserId);
    $('#modal_reject').modal();
}

function closeModel(){
    $('#reason').val('');
    $('#modal_reject').close();
}
//**********************
//**************iqbal work****************************
function rejectGML(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var reason = $('#reason').val();
    var id =  $('#hidden').text();

    $.ajax({
        type: "POST",
        url: '../gml/rejectPendingGml/'+id,
        data:{_token: CSRF_TOKEN,'reason':reason,'id':id},
        success: function(data) {
            location.reload();
        }
    });
}
//***********************iqbal work*************************
function rejectSubGML(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var reason = $('#reason').val();
    var id =  $('#hidden').text();

    $.ajax({
        type: "POST",
        url: '../gml/rejectPendingSubGml/'+id,
        data:{_token: CSRF_TOKEN,'reason':reason,'id':id},
        success: function(data) {
            location.reload();
        }
    });
}


function subMaterials(id){
    window.location = "/gml/showsub/"+id;
}