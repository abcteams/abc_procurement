$(function() {
    $('.select2').select2();
});

function getSubZone(workzone){
    if(workzone.value > 0){
    $('.ajaxProgress').show();
        var url =   '../materialinquiry/getSubzones';
        $.ajax({
            type: "GET",
            url: url,
            data:{'workzone':workzone.value},
            success: function(data) {
                $("#subworkzone").find('option').not(':first').remove();
                $data   =   JSON.parse(data);
                if($data.length > 0){
                    $.each( $data , function( key, value ) {
                        $("#subworkzone").append('<option value="'+value.id+'" >'+value.title+'</option>');
                    });
                }
                $('.ajaxProgress').hide();
            }
        });
    }else{
        $("#subworkzone").find('option').not(':first').remove();
    }
}

function addToOrder(button,type,id) {

    button.disabled = true
    var tr = $(button.closest('tr')).clone();
    tr.find("td:first").remove();
    tr.find('td:last-child').remove();
    tr.find('td:last-child').remove();
    tr.find('td:last-child').remove();
    tr.append('');

    $.ajax({
        type: "GET",
        url: '../addToCart',
        data:{'id':id,'type':type},
        success: function(data) {
            var value   =    parseInt($('#cart_lenght').text());
            value       =  value+1;
            $('#cart_lenght').text(value);
            $('#cart_lenght2').text(value);
            $("#myCart").append(tr);
        }
    });

    return false;
}

function updateCart(id) {

    $.ajax({
        type: "GET",
        url: '../updateCart',
        data:{'id':id},
        success: function(data) {
            $("#myCart").append(tr);
        }
    });

    return false;
}


function removeCartItem(button,id) {
    debugger;
    base    =   window.location.origin;
    url     =   base+'/materialrequisition/removeItemFromCart';
    $.ajax({
        type: "GET",
        url: url,
        data:{'id':id},
        success: function(data) {
            var value   =    parseInt($('#cart_lenght').text());
            value       =  value-1;
            $('#cart_lenght').text(value);
            $('#cart_lenght2').text(value);
            button.closest('tr').remove();
        }
    });
    return false;
}

function removeItem(button,id) {
    debugger;
    return;
    $.ajax({
        type: "GET",
        url: '../removeItemFromCart',
        data:{'id':id},
        success: function(data) {
            button.closest('tr').remove()
        }
    });
}

function removeFromCart(button) {
    var type = button.getAttribute('data-type');
    var value = button.getAttribute('data-value');

    if(type == 'materials'){
        $("#material"+value).removeAttr("disabled");
    }

    if(type == 'accessories'){
        $("#accessory"+value).removeAttr("disabled");
    }

    button.closest('tr').remove();
    return false;
}


function submitOrderForm() {

    var data = {};
    materials   =   [];
    accessories =   [];
    errors      =   '';
    CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.each($(".materials_quantity"), function (index, value) {
        var quantity = value.value;
        var tr = $(value.closest('tr'));
        var old_quantity = tr.find('.real_qu').val();

        if (quantity == "" || parseInt(quantity) == 0) {
            $(value).css('border', '1px solid red');
            errors = 'Your Quantity should not be empty or more than the quantity';
            return false;
        }
        /* else if(parseInt(quantity) > parseInt(old_quantity))
         {
         $(value).css('border', '1px solid red');
         errors = 'Your Quantity should not be greater than the available quantity';
         return false;
         } */
        else{
            var obj=    {};
            obj['quantity']         =   quantity;
            obj['old_quantity']     =   old_quantity;
            obj['cart_id']          =   tr.find('.cart_id').val();
            obj['item_type']        =   tr.find('.item_type').val();
            obj['sub_material_id']  =   tr.find('.sub_material_id').val();
            sub_boq_id              =   tr.find('.sub_boq_id').val();
            materials.push(obj);
        }
    });

    $.each($(".accessories_quantity"), function (index, value) {
        var quantity = value.value;
        var tr = $(value.closest('tr'));
        var old_quantity = tr.find('.real_qu').val();


        if (quantity == "" || parseInt(quantity) == 0) {
            $(value).css('border', '1px solid red');
            errors = 'Your Quantity should not be empty or more than the quantity';
            return false;
        }
        /* else if(parseInt(quantity) > parseInt(old_quantity))
         {
         $(value).css('border', '1px solid red');
         errors = 'Your Quantity should not be greater than the available quantity';
         return false;
         } */
        else{

            var obj=    {};
            obj['quantity']     = quantity;
            obj['old_quantity']     =   old_quantity;
            obj['cart_id']      =   tr.find('.cart_id').val();
            obj['item_type']    =   tr.find('.item_type').val();
            obj['accessory']    = tr.find('.accessory_id').val();
            obj['sub_material'] = tr.find('.sub_material_id').val();
            sub_boq_id              =   tr.find('.sub_boq_id').val();
            accessories.push(obj);
        }
    });

    var delivery_date = $("#delivery_date").val();
    var complete_date = $("#complete_date").val();

    if (delivery_date == '' || complete_date == ''){
        errors = 'delivery date and complete date should not be empty';
    }

    if(errors != ''){
        swal({
            text: errors,
            title: "Wrong",
            icon: "warning",
            buttons: false,
            dangerMode: true,
        });

    }
    else if(materials.length == 0 && accessories.length == 0){
        swal({
            text: 'The Cart Is Empty',
            title: "Wrong",
            icon: "warning",
            buttons: false,
            dangerMode: true,
        });
    }else{

        data['delivery_date']   =   $("#delivery_date").val();
        data['complete_date']   =   $("#complete_date").val();
        data['boq_id']          =   sub_boq_id;
        data['materials']       =   materials;
        data['accessories']     =   accessories;

        swal({
            title: "Are you sure?",
            text: "Are You sure you Finished Your Order ?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: '../materialrequisition/addrequisition',
                        data:{_token: CSRF_TOKEN,'data':data},
                        success: function(data) {
                            swal({
                                title: "Done",
                                text: "Your order is Done ! Wait For Approve",
                                icon: "success",
                                button: "Ok!",
                            }).then(() => {
                                window.location = "/materialrequisition/myOrders"
                            });
                        }
                    });
                }
            });
    }
}

function updateQuantity()
{
    var data = {};
    materials   =   [];
    accessories =   [];
    errors      =   '';
    CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.each($(".materials_quantity"), function (index, value) {
        var store_quantity = value.value;
        var tr = $(value.closest('tr'));
        var mat_id = tr.find('.mat_id').val();
        var req_id = tr.find('.req_id').val();
        var sub_material_id = tr.find('.sub_material_id').val();
        var req_quantity = tr.find('.qty_required').val();
        var obj=    {};
        obj['store_quantity']   =   store_quantity;
        obj['req_quantity']     =   req_quantity;
        obj['mat_id']          =   mat_id;
        obj['sub_material_id'] =  sub_material_id;
        obj['req_id']          =   req_id;
        requisition_id          = req_id;
        materials.push(obj);

        if (store_quantity == ''){
            errors = 'store quantity should not be empty';
        }
    });

    $.each($(".accessories_quantity"), function (index, value) {
        var store_quantity = value.value;
        var tr = $(value.closest('tr'));
        var acc_id = tr.find('.acc_id').val();
        var req_id = tr.find('.req_id').val();
        var accessory_id = tr.find('.accessory_id').val();
        var req_quantity = tr.find('.qty_required').val();

        var obj=    {};
        obj['store_quantity']   =   store_quantity;
        obj['req_quantity']     =   req_quantity;
        obj['acc_id']          =   acc_id;
        obj['accessory']          =  accessory_id;
        obj['req_id']          =   req_id;
        requisition_id          = req_id;
        accessories.push(obj);

        if (store_quantity == ''){
            errors = 'store quantity should not be empty';
        }
    });

    if(errors != '') {
        swal({
            text: errors,
            title: "Wrong",
            icon: "warning",
            buttons: false,
            dangerMode: true,
        });
    }
    data['materials']       =   materials;
    data['accessories']     =   accessories;
    data['req_id']          =   requisition_id;
    $.ajax({
        type: "POST",
        url: '../storeQuantity',
        data:{_token: CSRF_TOKEN,'data':data},
        success: function(data) {
            window.location = "/materialrequisition/storekeeperPending"

        }
    });
}

function closeModel(){
    $('#modal_reject').close();
}
function closeModel2(){
    $('#modal_accept').close();
}

function delete_record(id){
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
                    url: 'removeRequisition',
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

function checkAllSuppliers(main_check){
    if(main_check.checked)
    {
        $('.checkSupplier').prop('checked',true);
    }else{
        $('.checkSupplier').prop('checked',false);
    }

}

function margeboqitmes(){

    size            = '';
    sizeUnit        = '';
    quantityUnit    = '';
    error           =   0;
    idArray = [];
    if($(".margethis:checked").length < 2){
        swal({
            title: "Worng",
            text: 'you should choose two items minimum to Marge',
            icon: "warning",
            buttons: false,
            dangerMode: true,
        })
    }else{
        $("#margeTable").find("input:checked").each(function (index, value) {
            var tds = 	value.closest('tr').children;

            if(index == 0)
            {
                size            =    $(tds).find('.size').val();
                sizeUnit        =    $(tds).find('.size_unit').val();
                QuantityUnit    =    $(tds).find('.quantity_unit').val();
                idArray.push($(tds).find('.id').val());
            }else{
                    size2            = $(tds).find('.size').val();
                    sizeUnit2        = $(tds).find('.size_unit').val();
                    QuantityUnit2    = $(tds).find('.quantity_unit').val();

                if(size == size2 && sizeUnit ==sizeUnit2 && QuantityUnit== QuantityUnit2)
                {
                    idArray.push($(tds).find('.id').val());
                }else{
                    error   =   1;
                    return false;
                }
            }
        });

        if(error    ==  0)
        {
            $.ajax({
                type: "GET",
                url: '../../margeMaterialswithkey',
                data:{'data':idArray},
                success: function(data) {
                  debugger;
                     location.reload();
                }
            });
        }else{
            swal({
                title: "Worng",
                text: 'All the items should have same Size , Size Unit and Quantity Unit',
                icon: "warning",
                buttons: false,
                dangerMode: true,
            })
        }
    }
}
