$(function() {
 //onload
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
                    url: 'removeWorkZone',
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
function delete_sub(id){
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
                    url: '../removeSubWorkZone',
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


function removeBoundary($sub_boq_id , $file_name){
    swal({
        title: "Are you sure?",
        text: "Are you sure do You Want to Remove This Specs ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: '../../removeBoundary',
                    data:{'id':$sub_boq_id,'file_name':$file_name},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
}
function subWorkzones(id){
    window.location = "/workzone/showsub/"+id;
}

function uploadBoundary(boundry) {
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















