$(function() {
    $('.select2').select2();
});

function getSubGml(item){
    if($('#user_id').val() > 0 )
        url    =  '../getsubgmlitems'
    else
        url    =  'getsubgmlitems'

    if(item.value != 0){
        $('.ajaxProgress').show();
        $.ajax({
            type: "GET",
            url: url,
            data:{'gml_id':item.value,'user_id':$('#user_id').val()},
            success: function(result) {
                var obj = JSON.parse(result);
                $('#material_table tbody > tr').remove();
                if(obj.length > 0)
                {
                    $.each(obj , function( index, value ) {
                        var checked = '';
                        if(value.supplier_id !== null){
                            checked = 'checked';
                        }
                        $('#material_table').append(
                            '<tr>' +
                                '<td>'+value.title+'</td>' +
                                '<td>'+value.description+'</td>' +
                                '<td>' +
                                    '<label class="switch switch-small">' +
                                        '<input type="checkbox" '+checked+' onclick="addsupplierMaterial(this,'+value.id+')"><span></span>' +
                                    '</label>' +
                                '</td>' +
                            '</tr>');

                    });
                }else{
                    $('#material_table').append(
                        '<tr>' +
                            '<td colspan="3">No Items</td>' +
                        '</tr>');
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
                    url: 'removeMaterial',
                    data:{'id':id},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

}

function myProposalDetails(id) {
    alert(id);
}
function myProposalDetails(id){
    window.location = "/supplier/myProposalDetails/"+id;
}

function addsupplierMaterial(material,id){
    if($('#user_id').val() > 0 )
        url    =  '../supplierMaterialList'
    else
        url    =  'supplierMaterialList'

    $.ajax({
        type: "GET",
        url: url,
        data:{'id':id,'checked':material.checked,'user_id':$('#user_id').val()},
        success: function(data) {
            swal({
                title: "Done",
                text: "Saved Successfully",
                icon: "success",
                buttons: false,
                dangerMode: false,
            })
        }
    });
}

function addEmail() {
   $('#ccEmailsList').append('<tr>' +
                            '<td><input type="email" class="form-control" name="ccemails[]" required> </td>' +
                            '<td><a class="btn btn-danger btn-condensed" onclick="removeRow(this)"><i class="fa fa-remove"></i> </a></td>' +
                            '</tr>');
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

function saveCCEmails(id){
    $.each($('.ccemails') , function( index, value ) {
       debugger;

    });
    $('.ccemails').each('',);

}
