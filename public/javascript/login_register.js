const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };

$(document).ready(function () {
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
    $('#form-register').submit(function () {
        let check = true;
        event.preventDefault();
        var currentLocation = window.location;
        currentLocation = currentLocation.protocol + "//" + currentLocation.host + "/account/Register";
        if(!validateEmail($('#email-register').val())){
            toastr["error"]("Email này không hợp lệ hoặc đã đuược sử dụng", "Lỗi email");
            check = false;
        }
        if (check){
            $.ajax({
                type: "POST",
                url: currentLocation,
                data: $(this).serializeArray(),
                dataType: "html",
                success: function (response) {
                    if (response == "-1"){
                        toastr["error"]("Đầu vào không hợp lệ", "Lỗi");
                    }else if (response == 0){
                        toastr["error"]("Email đã tồn tại", "Lỗi");
                    }else if (response == 1){
                        toastr["success"]("Tạo tài khoản thành công", "Thành công");
                        document.getElementById('form-register').reset();
                        document.getElementById('flip').click();
                    }
                }
            });
        }
        this.reset();
    })

    $('#form-login').submit(function () {
        let check = true;
        event.preventDefault();
        var currentLocation = window.location;
        currentLocationHome = currentLocation.protocol + "//" + currentLocation.host + "/home/overview";
        currentLocation = currentLocation.protocol + "//" + currentLocation.host + "/account/login_processing";
        
        $.ajax({
            type: "POST",
            url: currentLocation,
            data: $(this).serializeArray(),
            dataType: "html",
            success: function (response) {
                if (response == "0"){
                    toastr["error"]("Email hoặc mật khẩu khồng đúng", "Đăng nhập thất bại");
                }else if (response == "1"){
                    toastr["success"]("Đăng nhập thành công", "Thành công");
                    window.location.replace(currentLocationHome);
                }
            }
        });
    })

})