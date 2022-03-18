var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '/' + mm + '/' + yyyy;

var tokay_input = yyyy + '-' + mm + '-' + dd;
var value_res;

var TheWeb = document.getElementById('The-main-web').value
var hostName = window.location;
hostName = hostName.protocol + "//" + hostName.host + "/jsonPosessing/export_data/" + TheWeb + "";

$('#Day-picker').val(today);
var maxdate = new Date();
maxdate.setDate(maxdate.getDate() - 1);

$('#Day-picker').datepicker({
    dateFormat: 'dd-mm-yy',
    range: false,
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    onClose: function (dateText, inst) {
        console.log(dateText);
    }
})

$('#Day-picker-form').val(tokay_input);

$(document).ready(function () {
    waitForData()
    var date = "";
    // khởi tạo
    requestData(hostName, date);
    
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    // Sửa bản ghi
    $("#form-edit-value").on('submit', function () {
        event.preventDefault();
        id = $(this).serializeArray()[0]['value'];
        $.ajax({
            type: "POST",
            url: this.action,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if (response == 1) {
                    toastr["success"]("Sửa bản ghi thành công", "Thành công");
                    edit_update(id);
                }
            }
        });
        $('#btn-form-edit-close').click()
    })

    // Xóa bản ghi
    $("#form-delete-value").on('submit', function () {
        event.preventDefault();
        id = $(this).serializeArray()[0]['value'];
        $.ajax({
            type: "POST",
            url: this.action,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if (response == 1) {
                    toastr["success"]("Xóa bản ghi thành công", "Thành công");
                    delete_update(id);
                }
            }
        });

        $('#btn-form-delete-close').click()
    })

    // Lưu bản ghi mới
    $("#form-save-new-value").on('submit', function () {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: this.action,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if (response > 0) {
                    toastr["success"]("Thêm bản ghi mới thành công", "Thành công");
                    add_new_ban_gi(response, $('#new-value-title').val(), $("#new-value-price").val(), $("#Day-picker-form").val(), $('#new-value-description').val())
                    document.getElementById('form-save-new-value').reset();
                    $('#Day-picker-form').val(tokay_input);
                    $('.action-delete').off('click');
                    $('.action-edit').off('click');
                    onclickListener()
                }
            }
        });
        $('#btn-form-close').click()
    })

    // Tìm kiếm theo ngày
    $("#box-find-this-day").on('submit', function () {
        event.preventDefault();
        waitForData();
        var date = $('#Day-picker').val();
        requestData(hostName, date);
    })
});

