$(function() {
    $('.select2').select2();
});

function getSubScl(item){
    var subScl=$('#subScl');
    if(item.value != 0){
        subScl.prop('disabled', false);
        $.ajax({
            type: "GET",
            url: '../getsubsclitems',
            data:{'scl_id':item.value},
            success: function(result) {
                var obj = JSON.parse(result);

                subScl.find('option').remove();
                if(obj.length > 0)
                {
                    subScl.append($("<option></option>")
                        .attr("value",'0')
                        .text('Choose Sub Scl'));

                    $.each(obj , function( index, value ) {
                        subScl.append($("<option></option>")
                            .attr("value",value.id)
                            .text(value.title));

                    });
                }else{
                    subScl.append($("<option></option>")
                        .attr("value",'0')
                        .text('No Sub Items'));
                }
            }
        });
    }else{
        subScl.find('option').remove();
        subScl.append($("<option></option>")
            .attr("value",'0')
            .text('Choose Sub Scl'));

        subScl.prop('disabled', 'disabled');
    }

}
function serachScl(){
    var type    =   $("#searchType").val();
    var word    =   $("#searchScl").val();

    $.ajax({
        type: "GET",
        url: 'sclSearch',
        data:{'type':type,'search':word},
        success: function(data) {
            var obj = JSON.parse(data);
            var table=$('#SclList');
            table.find("tr:gt(0)").remove();
            $.each(obj , function( index, value ) {
                table.append('<tr  class="subMatItems" onclick="subMaterials('+value.id+')">'+
                    '<td><strong>'+value.title+'</strong></td>' +
                    '<td>'+value.description+'</td>' +
                    '<td><a href="pendingSub/'+value.id+'" class="btn btn-info" style="width:120px">Pending</a></td>' +
                    '<td><a href="add/'+value.id+'" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>' +
                    '<button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_row('+value.id+');"><span class="fa fa-times"></span></button>' +
                    '</td>' +
                    '</tr>');
            });
        }
    });

}

function serachSubscl(id){
    var type    =   $("#subScltype").val();
    var word    =   $("#searchSubScl").val();

    $.ajax({
        type: "GET",
        url: '../subSclSearch',
        data:{'scl_id':id,'type':type,'search':word},
        success: function(result) {
            var obj = JSON.parse(result);
            var table=$('#subSclList');
            table.find("tr:gt(0)").remove();

            $.each(obj , function( index, value ) {
                table.append('<tr>'+
                    '<td><strong>'+value.title+'</strong></td>' +
                    '<td>'+value.description+'</td>' +
                    '<td><a href="../addsub/'+value.scl_id+'/'+value.id+'" class="btn btn-default btn-rounded btn-condensed btn-sm"><span class="fa fa-pencil"></span></a>' +
                    '<button class="btn btn-danger btn-rounded btn-condensed btn-sm" onclick="delete_sub('+value.id+');"><span class="fa fa-times"></span></button>' +
                    '</td>' +
                    '</tr>');
            });
        }
    });

}


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
                    url: '../removescr',
                    data:{'id':id},
                    success: function(data) {
                      location.reload();
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
                    url: '../removesubscr',
                    data:{'id':id},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

}


function showsubscr(id){
    window.location = "/scr/showsubscr/"+id;
}