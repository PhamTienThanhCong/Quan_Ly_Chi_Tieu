<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/list.css">

<div class="title-name-list">
    Danh sách <?php echo $name_page ?>
</div>
<hr>
<div class="fill-choice">

<input type="hidden" value="<?php echo $type?>" id="The-main-web">

    <div class="p-2">
        <div class="container-choice-date">
            <p class="calender-fill-title">Lọc theo ngày</p>
            <form class="box" id="box-find-this-day">
                <input type="text" class="datepicker-here form-control" id="Day-picker" data-date-format="dd/mm/yyyy" data-language='en' placeholder="Lựa chọn ngày">
                <button>Chọn tìm kiếm</button>
            </form>
        </div>
    </div>
</div>

<hr>
<ul class="list-item-save" id="list-item-save">
<div class="body-loading">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
    <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>
</ul>


<div class="add-item-font">
    <button id="add-item" data-toggle="modal" data-target="#myModal" href="">
        <i class="fa-solid fa-circle-plus"></i>
    </button>
</div>

<?php require_once "./src/views/content/modal.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.min.js"></script>
    
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript" src="<?php echo $actual_link ?>/public/javascript/list.js"> </script>
<script type="text/javascript" src="<?php echo $actual_link ?>/public/javascript/add_value.js"> </script>