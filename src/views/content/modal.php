<!-- Modal tao moi -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close-models" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm <?php echo $name_page?></h4>
            </div>
            <form method="post" id="form-save-new-value" action="<?php echo $actual_link ?>/JsonPosessing/save_data/<?php echo $type?>">
                <div class="modal-body">
                    <p>Ngày ghi</p>
                    <input type="date" name="day" id="Day-picker-form" data-date-format="dd/mm/yyyy" placeholder="Lựa chọn ngày" required>
                    <p>Tên khoản</p>
                    <input type="text" id="new-value-title" name="name-title" required>
                    <p>Số tiền</p>
                    <input type="number" id="new-value-price" name="price" required>
                    <p>Ghi chú</p>
                    <textarea name="description" id="new-value-description" cols="30" rows="4"></textarea>

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
                <h5 class="modal-title" id="exampleModalLongTitle">Xác nhận xóa <?php echo $name_page?></h5>
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
                <form id="form-delete-value" method="POST" action="<?php echo $actual_link ?>/JsonPosessing/delete_data/<?php echo $type?>">
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
                <h4 class="modal-title">Chỉnh sửa <?php echo $name_page?></h4>
            </div>
            <form method="post" id="form-edit-value" action="<?php echo $actual_link ?>/JsonPosessing/update_data/<?php echo $type?>">
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