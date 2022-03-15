<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/list.css">

<div class="title-name-list">
    Danh sách <?php echo $name_page ?>
</div>
<hr>
<div class="fill-choice">


    <div class="p-2">
        <div class="container-choice-date">
            <p class="calender-fill-title">Lọc theo ngày</p>
            <form class="box">
                <input type="text" class="datepicker-here form-control" id="Day-picker" data-date-format="dd/mm/yyyy" data-language='en' placeholder="Lựa chọn ngày">
                <button>Chọn tìm kiếm</button>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.min.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</div>

<hr>
<ul class="list-item-save" id="list-item-save">
    <li>
        <p class="name-item">
            <b>Tên:</b>
            <a href="" class="xem-chi-tiet">Gói hàng shoppe mất nhiều tiền quá vì nó đặt vl nhưng suy cho cùng lại đẹp</a>
        </p>
        <p class="name-info">
            - Số tiền: 1,500
        </p>
        <p class="name-info">
            - Thời gian: 22/2/2022
        </p>
        <div data-title="Gói hàng shoppe mất nhiều tiền quá vì nó đặt vl nhưng suy cho cùng lại đẹp" data-date="22/2/2002" data-price="1tr5" data-description="mô tả hay vl" data-id="1" class="action-list-item">
            <a class="action-list-item-this action-edit" type="button" data-toggle="modal" data-target="#myModalEdit">
                <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a class="action-list-item-this action-delete" style="color:red" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fa-regular fa-trash-can"></i>
            </a>
        </div>
    </li>
    <hr>
    
</ul>


<div class="add-item-font">
    <button id="add-item" data-toggle="modal" data-target="#myModal" href="">
        <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>

<!-- Modal tao moi -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close-models" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm chi tiêu</h4>
            </div>
            <form method="post" id="form-save-new-value" action="<?php echo $actual_link ?>/JsonPosessing/save_data/expense">
                <div class="modal-body">
                    <p>Ngày ghi</p>
                    <input type="date" name="day" id="Day-picker-form" data-date-format="dd/mm/yyyy" placeholder="Lựa chọn ngày" required>
                    <p>Tên khoản</p>
                    <input type="text" name="name-title" required>
                    <p>Số tiền</p>
                    <input type="number" name="price" required>
                    <p>Ghi chú</p>
                    <textarea name="description" id="" cols="30" rows="4"></textarea>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" style="background-color: #5cc4ef"> lưu lại</button>
                    <button type="button" id="btn-form-close" class="btn btn-default" style="background-color: #d75e5e" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>

    </div>
</div>


<!-- Modal accet xoa -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-body-title"></p>
                <p id="modal-body-price"></p>
                <p id="modal-body-date"></p>
            </div>
            <div class="modal-footer">
                <form id="form-delete-value" method="POST" action="<?php echo $actual_link ?>/JsonPosessing/delete_data/expense">
                    <input type="hidden" name="id" id="modal-form-id">
                    <button class="btn btn-danger">Xác nhận xóa</button>
                </form>
                <button type="button" id="btn-form-delete-close" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close-models" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh sửa chi tiêu</h4>
            </div>
            <form method="post" id="form-edit-value" action="<?php echo $actual_link ?>/JsonPosessing/update_data/expense">
                <div class="modal-body">
                    <input type="hidden" id="form-modal-id" name="id" > 
                    <p>Ngày ghi</p>
                    <input type="date" id="form-modal-date" name="day" id="Day-picker-form" data-date-format="dd/mm/yyyy" placeholder="Lựa chọn ngày">
                    <p>Tên khoản</p>
                    <input type="text" id="form-modal-title" name="name-title">
                    <p>Số tiền</p>
                    <input type="number" id="form-modal-price" name="price">
                    <p>Ghi chú</p>
                    <textarea id="form-modal-description" name="description" id="" cols="30" rows="4"></textarea>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" style="background-color: #5cc4ef"> lưu lại</button>
                    <button type="button" id="btn-form-edit-close" class="btn btn-default" style="background-color: #d75e5e" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript" src="<?php echo $actual_link ?>/public/javascript/list.js"> </script>