var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = dd + '/' + mm + '/' + yyyy;

var tokay_input = yyyy + '-' + mm + '-' + dd;

$('#Day-picker').val(today);
var maxdate = new Date();
    maxdate.setDate(maxdate.getDate() - 1);

$('#Day-picker').datepicker({
        dateFormat: 'dd-mm-yy',
        range : false,
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst) {  
            console.log(dateText);
        }
})

function formatDate(date) {
    var d = date.split('-');
    return d[2]+'-'+d[1]+'-'+d[0]    
}

function addNewList(){
    document.getElementById('list-item-save').innerHTML = "";
    for (let i = value_res.length - 1; i >= 0  ; i--) {
        document.getElementById('list-item-save').innerHTML += `
        <li id="list-item-` + value_res[i]['id'] + `">
            <p class="name-item">
                <b>Tên:</b>
                <a href="" class="xem-chi-tiet">`+value_res[i]['title']+`</a>
            </p>
            <p class="name-info">
                - Số tiền: `+(parseInt(value_res[i]['price']).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}))+`
            </p>
            <p class="name-info">
                - Thời gian: `+formatDate(value_res[i]['created_at'])+`
            </p>
            <div data-title="`+value_res[i]['title']+`" data-date="`+formatDate(value_res[i]['created_at'])+`" data-price="`+value_res[i]['price']+`" data-description="`+value_res[i]['description']+`" data-id="`+value_res[i]['id']+`" class="action-list-item">
                <a class="action-list-item-this action-edit" type="button" data-toggle="modal" data-target="#myModalEdit">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a class="action-list-item-this action-delete" style="color:red" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </div>
        </li>
        <hr>`
    }
    $('.action-delete').off('click');
    $('.action-edit').off('click');
}

function edit_update(id){
    var id_edit = "list-item-"+id+"";
    document.getElementById(id_edit).innerHTML = `
    <p class="name-item">
        <b>Tên:</b>
        <a href="" class="xem-chi-tiet">`+$('#form-modal-title').val()+`</a>
    </p>
    <p class="name-info">
        - Số tiền: `+parseInt($('#form-modal-price').val()).toLocaleString('it-IT', {style : 'currency', currency : 'VND'})+`
    </p>
    <p class="name-info">
        - Thời gian: `+formatDate($('#form-modal-date').val())+`
    </p>
    <div data-title="`+$('#form-modal-title').val()+`" data-date="`+formatDate($('#form-modal-date').val())+`" data-price="`+$('#form-modal-price').val()+`" data-description="`+$('#form-modal-description').val()+`" data-id="`+$('#form-modal-id').val()+`" class="action-list-item">
        <a class="action-list-item-this action-edit" type="button" data-toggle="modal" data-target="#myModalEdit">
            <i class="fa-regular fa-pen-to-square"></i>
        </a>
        <a class="action-list-item-this action-delete" style="color:red" type="button" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fa-regular fa-trash-can"></i>
        </a>
    </div>`
}

function delete_update(id){
    var id_edit = "#list-item-"+id+"";
    $(id_edit).remove();
}

$('#Day-picker-form').val(tokay_input);

function onclickListener(){
    $('.action-delete').on('click',function(){
    var el = this.parentNode
    document.getElementById('modal-form-id').value = el.dataset.id
    $('#modal-body-title').html("- Tên: " + el.dataset.title)    
    $('#modal-body-price').html("- Giá: " + el.dataset.price)
    $('#modal-body-date').html("- Ngày tháng: " + el.dataset.date)  
})
$('.action-edit').on('click', function(){
    var el = this.parentNode
    var date = el.dataset.date.split('-');
    if(date[1].length == 1){
        date[1] = 0+date[1]
    }
    var newDate = date[2] + '-' + date[1] + '-' + date[0]
    $('#form-modal-id').val(el.dataset.id)
    $('#form-modal-date').val(newDate)
    $('#form-modal-title').val(el.dataset.title)
    $('#form-modal-price').val(el.dataset.price)
    $('#form-modal-description').val(el.dataset.description)
})
}
var value_res;
$(document).ready(function () {
    var hostName = window.location;
    hostName = hostName.protocol + "//" + hostName.host + "/jsonPosessing/export_data/expense";
    $.ajax({
        type: "GET",
        url: hostName,
        data: "",
        dataType: "json",
        success: function (response) {
            value_res = response;
            addNewList();
            onclickListener()
        }
    });
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
    
    $("#form-edit-value").on('submit',function () {
        event.preventDefault();
        id = $(this).serializeArray()[0]['value'];
        $.ajax({
            type: "POST",
            url: this.action,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if(response == 1){
                    toastr["success"]("Sửa bản ghi thành công", "Thành công");
                    edit_update(id);
                }
            }
        });
        // this.reset()
        // $('#form-modal-date').val(tokay_input);

        $('#btn-form-edit-close').click()
    })
    $("#form-delete-value").on('submit',function () {
        event.preventDefault();
        id = $(this).serializeArray()[0]['value'];
        $.ajax({
            type: "POST",
            url: this.action,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if(response == 1){
                    toastr["success"]("Xóa bản ghi thành công", "Thành công");
                    delete_update(id);
                }
            }
        });

        $('#btn-form-delete-close').click()
    })
    $("#form-save-new-value").on('submit',function () {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: this.action,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if(response == 1){
                    toastr["success"]("Thêm bản ghi mới thành công", "Thành công");
                }
            }
        });
        this.reset()
        $('#Day-picker-form').val(tokay_input);
        $('#btn-form-close').click()
    })
});

