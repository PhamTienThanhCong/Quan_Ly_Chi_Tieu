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

$('#Day-picker-form').val(tokay_input);

$('.action-delete').on('click',function(){
    var el = this.parentNode
    document.getElementById('modal-form-id').value = el.dataset.id
    $('#modal-body-title').html("- Tên: " + el.dataset.title)    
    $('#modal-body-price').html("- Giá: " + el.dataset.price)
    $('#modal-body-date').html("- Ngày tháng: " + el.dataset.date)  
})

$('.action-edit').on('click', function(){
    var el = this.parentNode
    var date = el.dataset.date.split('/');
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

