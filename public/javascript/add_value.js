function waitForData(){
    document.getElementById('list-item-save').innerHTML = `
    <div class="body-loading">
        <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
            <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
        </svg>
    </div>
    `;
}

function addNewList(){
    document.getElementById('list-item-save').innerHTML = "";
    var day = value_res[0]['created_at'];
    for (let i = 0 ; i < value_res.length  ; i++) {
        if (day != value_res[i]['created_at']){
            document.getElementById('list-item-save').innerHTML = `
                <div class = "alert-day-list"> 
                <i class="fa-regular fa-calendar-days"></i> 
                Bản ghi ngày: ` + formatDate(day) + `</div>
            ` + document.getElementById('list-item-save').innerHTML;
            day = value_res[i]['created_at'];
        }
        add_new_ban_gi(value_res[i]['id'], value_res[i]['title'], value_res[i]['price'], value_res[i]['created_at'], value_res[i]['description'])
    }
    document.getElementById('list-item-save').innerHTML = `
                <div class = "alert-day-list"><i class="fa-regular fa-calendar-days"></i> 
                Bản ghi ngày: ` + formatDate(value_res[value_res.length - 1]['created_at']) + `</div>
            ` + document.getElementById('list-item-save').innerHTML;

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

function responseError() {
    document.getElementById('list-item-save').innerHTML = `
    <div class="body-loading">
        <h3>
            Dữ liệu ngày `+$('#Day-picker').val()+` không tồn tại
        </h3>
    </div>
    `
}

function add_new_ban_gi(id, title, price, date, description){
    document.getElementById('list-item-save').innerHTML = `
        <li id="list-item-` + id + `">
            <p class="name-item">
                <b>Tên:</b>
                <a href="" class="xem-chi-tiet">`+title+`</a>
            </p>
            <p class="name-info">
                - Số tiền: `+(parseInt(price).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}))+`
            </p>
            <p class="name-info">
                - Thời gian: `+formatDate(date)+`
            </p>
            <div data-title="`+title+`" data-date="`+formatDate(date)+`" data-price="`+price+`" data-description="`+description+`" data-id="`+id+`" class="action-list-item">
                <a class="action-list-item-this action-edit" type="button" data-toggle="modal" data-target="#myModalEdit">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a class="action-list-item-this action-delete" style="color:red" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </div>
        </li>
        <hr>
    ` + document.getElementById('list-item-save').innerHTML;
}

function delete_update(id){
    var id_edit = "#list-item-"+id+"";
    $(id_edit).remove();
}

function onclickListener() {
    $('.action-delete').on('click', function () {
        var el = this.parentNode
        document.getElementById('modal-form-id').value = el.dataset.id
        $('#modal-body-title').html("- Tên: " + el.dataset.title)
        $('#modal-body-price').html("- Giá: " + el.dataset.price)
        $('#modal-body-date').html("- Ngày tháng: " + el.dataset.date)
    })
    $('.action-edit').on('click', function () {
        var el = this.parentNode
        var date = el.dataset.date.split('-');
        if (date[1].length == 1) {
            date[1] = 0 + date[1]
        }
        var newDate = date[2] + '-' + date[1] + '-' + date[0]
        $('#form-modal-id').val(el.dataset.id)
        $('#form-modal-date').val(newDate)
        $('#form-modal-title').val(el.dataset.title)
        $('#form-modal-price').val(el.dataset.price)
        $('#form-modal-description').val(el.dataset.description)
    })
}

function formatDate(date) {
    var d = date.split('-');
    return d[2] + '-' + d[1] + '-' + d[0]
}

function formatDate2(date) {
    if (date == ""){
        return "";
    }
    var d = date.split('/');
    return d[2] + '-' + d[1] + '-' + d[0];
}

function requestData(hostName, date){
    date = formatDate2(date);
    $.ajax({
        type: "POST",
        url: hostName,
        data: {"date": date},
        dataType: "json",
        success: function (response) {
            value_res = response;
            if (value_res.length == 0){
                responseError()
            }else{
                addNewList();
                onclickListener()
            }
        }
    });
}