$(function() {
    $('.select2').select2();
});

/*added by roshan*/
function reject_User(id){
    swal({
        title: "Are you sure?",
        text: "Are You sure you Want to Reject this User!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: 'rejectUser',
                    data:{'id':id},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

}

//******* created by iqbal *************
function delete_user(id){
    swal({
        title: "Are you sure?",
        text: "Current User Will Be Deleted! !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: '../deleteUser/'+id,
                    data:{'id':id},
                    success: function(data) {
                        window.location = "/users/showUsers";
                    }
                });
            }
        });

}

//**************Created by iqbal ********
function reset_password(id){
    swal({
        title: "Are you sure?",
        text: "User Password Will Reset To: User123!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: '../resetPassword/'+id,
                    data:{'id':id},
                    success: function(data) {
                        window.location = "/users/showuserprofiel/"+id;
                    }
                });
            }
        });

}

function saveTheRules(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: "Are you sure?",
        text: "Are You sure you Want Update The Rules!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
        .then((willDelete) => {
            if (willDelete) {

                var id      = $('#screen').val();
                var screen_id   = $('.screen_id');
                data = [];
                $.each(screen_id ,function (index ,value) {
                    $object =   {};
                    $('#can_show'+value.value).is(':checked')       ? $object.can_show = 1 : $object.can_show =0 ;
                    $('#can_edit'+value.value).is(':checked')       ? $object.can_edit = 1 : $object.can_edit =0 ;
                    $('#can_approve'+value.value).is(':checked')    ? $object.can_approve = 1 : $object.can_approve =0 ;
                    $('#can_approve2'+value.value).is(':checked')   ? $object.can_approve2 = 1 : $object.can_approve2 =0 ;
                    $('#can_approve3'+value.value).is(':checked')   ? $object.can_approve3 = 1 : $object.can_approve3 =0 ;
                    $object.screen          = value.value;
                    data.push($object);
                });
                debugger;
                $.ajax({
                    type: "POST",
                    url: '../setTheRules',
                    data:{_token: CSRF_TOKEN,'id':id,'data':data},
                    success: function(data) {
                        window.location = "/users/showUsers";
                    }
                });
            }
        });
}
function saveThePosition(){
    position_name   =   $("#position_name").val();
    var checkName   =   position_name.replace(/ /g,'');
    position_id   =   $("#position_id").val();
    if(checkName == ""){
        $("#position_name").css('border','1px solid red');
        swal({
            title: "Stop!!!",
            text: "You should Enter The Position Name",
            icon: "warning",
            buttons: false,
            dangerMode: true,
        })
        return;
    }

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: "Are you sure?",
        text: "Are You sure you Want To Update The Rules!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var id      = $('#screen').val();
                var screen_id   = $('.screen_id');
                position    = position_name;
                data = [];
                $.each(screen_id ,function (index ,value) {
                    $object =   {};
                    $('#can_show'+value.value).is(':checked')       ? $object.can_show = 1 : $object.can_show =0 ;
                    $('#can_edit'+value.value).is(':checked')       ? $object.can_edit = 1 : $object.can_edit =0 ;
                    $('#can_approve'+value.value).is(':checked')    ? $object.can_approve = 1 : $object.can_approve =0 ;
                    $('#can_approve2'+value.value).is(':checked')   ? $object.can_approve2 = 1 : $object.can_approve2 =0 ;
                    $('#can_approve3'+value.value).is(':checked')   ? $object.can_approve3 = 1 : $object.can_approve3 =0 ;
                    $object.screen          = value.value;
                    data.push($object);
                });
                $.ajax({
                    type: "POST",
                    url: '/users/setThePositions',
                    data:{_token: CSRF_TOKEN,'title':position,'data':data,'id':position_id},
                    success: function(data) {
                       window.location = "/users/showPositions";
                    }
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
                    url: 'removegml',
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
                    url: '../removesubgml',
                    data:{'id':id},
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        });

}
function saveWorkzoneRules() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: "Are you sure?",
        text: "Are You sure you Want To Update The Rules!",
        icon: "warning",
        buttons: true,
        dangerMode: false,
    })
        .then((willDelete) => {
            if (willDelete) {

                var id      = $('#user_id').val();
                var workzone   = $('.workzone');
                data = [];
                $.each(workzone ,function (index ,value) {
                    $object =   {};
                    if($(value).is(':checked') == false){
                        $object.workzone    =   value.value;
                        data.push($object);
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '../setWorkzoneRules',
                    data:{_token: CSRF_TOKEN,'id':id,'data':data},
                    success: function(data) {
                        window.location = "/users/showUsers";
                    }
                });
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

function userProfile(id){
    window.location = "/users/showuserprofiel/"+id;
}

function supplierInfo(id){
    window.location = "/users/showSupplierInfo/"+id;
}
function subcontractorInfo(id){
    window.location = "/users/showSubcontractorInfo/"+id;
}