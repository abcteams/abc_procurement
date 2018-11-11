$(function() {
    $('.select2').select2();
});

function getSubGml(item){
    var subGml=$('#subGml');
    if(item.value != 0){
        subGml.prop('disabled', false);
        $('.ajaxProgress').show();
        $.ajax({
            type: "GET",
            url: '../getsubgmlitems',
            data:{'gml_id':item.value},
            success: function(result) {
                var obj = JSON.parse(result);

                subGml.find('option').remove();
                if(obj.length > 0)
                {
                    subGml.append($("<option></option>")
                        .attr("value",'0')
                        .text('Choose Sub Gml'));

                    $.each(obj , function( index, value ) {
                        subGml.append($("<option></option>")
                            .attr("value",value.id)
                            .text(value.title));

                    });
                }else{
                    subGml.append($("<option></option>")
                        .attr("value",'0')
                        .text('No Sub Items'));
                }
                $('.ajaxProgress').hide();
            }
        });
    }else{
        subGml.find('option').remove();
        subGml.append($("<option></option>")
            .attr("value",'0')
            .text('Choose Sub Gml'));

        subGml.prop('disabled', 'disabled');
    }



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
                    url: '../removeSubBoq',
                    data:{'id':id},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

}
function delete_boq(id){
    swal({
        title: "Are you sure?",
        text: "Are You sure you Want to Delete this record! , if you remove it , all it's item and inquiry will remove",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: '../../boq/removeBoq',
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


function removeSpecs($sub_boq_id , $file_name){
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
                    url: '../../removeSpecs',
                    data:{'id':$sub_boq_id,'file_name':$file_name},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });
}

function showsubboq(id){
    window.location = "/boq/showsubboq/"+id;
}

function removeRow(row,id=0){
    if(parseInt(id) > 0){
        swal({
            title: "Are you sure?",
            text: "Are you sure do You Want to Remove This Record?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "GET",
                        url: '../removeAccessorie',
                        data:{'id':id},
                        success: function(data) {
                            row.closest('tr').remove();
                        }
                    });
                }
            });
    }else{
        row.closest('tr').remove();
    }
}
function addAccessories(){
    $('#accessoriesList').append('' +
        '<tr>' +
            '<td><input type="text" class="form-control" name="description[]" ></td>' +
            '<td><input type="number" class="form-control" name="quantity[]" ></td>' +
            '<td><input type="text" class="form-control" name="model[]" ></td>' +
            '<td><a class="btn btn-danger btn-condensed" onclick="removeRow(this)"><i class="fa fa-remove"></i> </a> </td>' +
        '</tr>'
    );

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

function getTotalPrice(){
    $("#totalPrice").val($("#unitPrice").val()*$("#quantity").val());
}
function removeinquiry(workzone,subgml,id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: "Are you sure?",
        text: "Are you sure do You Want to Remove This Record?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: 'removeinquiry',
                    data:{_token: CSRF_TOKEN,'work_zone_id':workzone,'sub_gml_id':subgml,'id':id},
                    success: function(data) {
                        debugger;
                        location.reload();
                    }
                });
            }
        });

}