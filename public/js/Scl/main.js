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
                    url: 'removescl',
                    data:{'id':id},
                    success: function(data) {
                        if(data.length > 1)
                        {
                            swal({
                                title: "Wrong",
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
function delete_sub(id ,type){

    if(type == 1)
        var url    =   '../removesubscl';
    else
        var url    =   'removesubscl';

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
                                title: "Wrong",
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


function subMaterials(id){
    window.location = "/scl/showsub/"+id;
}