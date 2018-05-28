/**
 * Created by Admin on 5/28/2018.
 */

deleteFunction = function (url, dataTable) {

    swal({
        title: "Konfirmo?",
        text: "Jeni te sigurt qe doni ta fshini?",
        type: "info",
        showCancelButton: true,
        confirmButtonText: "Po, jam i sigurt!",
        cancelButtonText: "Anullo",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
        $.ajax({
            url: url,
            type: 'GET',
            data: {_token: $('input[name="_token"]').val()},
            success: function (d) {

                if (d.status === 200) {

                    if (dataTable !== undefined) {
                        $('#' + dataTable).DataTable().ajax.reload();
                    }
                    swal({
                        title: "Sukses",
                        text: d.message,
                        type: "success",
                        confirmButtonColor: '#15B25F',
                        confirmButtonClass: "btn btn-success",
                        confirmButtonText: "Vazhdo!",
                        html: true
                    });
                }
                else {
                    swal({
                        title: "Error",
                        text: d.message,
                        type: "error",
                        confirmButtonColor: '#15B25F',
                        confirmButtonClass: "btn btn-success",
                        confirmButtonText: "Ok, Continue",
                        html: true
                    });
                }
            }
        });
    });
};
