$(function() {
    $('.select2').select2();
});

function showSubScl(item){
    if($('#user_id').val() > 0 )
        url    =  '../getsubsclitemsForUser'
    else
        url    =  'getsubsclitemsForUser'

    if(item.value != 0){
        $('.ajaxProgress').show();
        $.ajax({
            type: "GET",
            url: url,
            data:{'scl_id':item.value,'user_id':$('#user_id').val()},
            success: function(result) {
                var obj = JSON.parse(result);
                $('#material_table tbody > tr').remove();
                if(obj.length > 0)
                {
                    $.each(obj , function( index, value ) {
                        var checked = '';
                        if(value.subcontractor_id !== null){
                            checked = 'checked';
                        }
                        $('#material_table').append(
                            '<tr>' +
                            '<td>'+value.title+'</td>' +
                            '<td>'+value.description+'</td>' +
                            '<td>' +
                            '<label class="switch switch-small">' +
                            '<input type="checkbox" '+checked+' onclick="addSubcontractorMaterial(this,'+value.id+')"><span></span>' +
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
        subScl.find('option').remove();
        subScl.append($("<option></option>")
            .attr("value",'0')
            .text('Choose Sub Scl'));

        subScl.prop('disabled', 'disabled');
    }

}

function addSubcontractorMaterial(material,id){
    if($('#user_id').val() > 0 )
        url    =  '../subcontractorMaterialList'
    else
        url    =  'subcontractorMaterialList'

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



function getSubScl(item){
    var subScl=$('#subScl');
    if(item.value != 0){
        subScl.prop('disabled', false);
        $.ajax({
            type: "GET",
            url: 'getsubsclitems',
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
                    url: 'removeCategotry',
                    data:{'id':id},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

}