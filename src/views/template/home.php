<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c71231073e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/footer_mobie.css">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/home.css">
    <link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/loading.css">
    <link rel="shortcut icon" href="<?php echo $actual_link ?>/public/images/default/icon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
    <title><?php echo $name_page ?></title>
</head>

<?php 
    if ($name_page == "Tổng quan"){
        $type="overView";
    }else if ($name_page == "Khoản thu"){
        $type="revenue";
    }else if ($name_page == "Khoản chi"){
        $type="expense";
    }else if ($name_page == "Hũ tài chính"){
        $type="FinancialJar";
    }
?>

<style>
    <?php echo "#".$type?> {
      background-color: black;
    }
</style>

<body>
    <header>
        <ul>
            <li class="logo">
                Money
            </li>
            <li class="btn"><span class="fas fa-bars"></span></li>
            <div class="items">
                <li><a href="<?php echo $actual_link ?>/home">Tổng quan</a></li>
                <li><a href="<?php echo $actual_link ?>/home/Thu">Khoản thu</a></li>
                <li><a href="<?php echo $actual_link ?>/home/Chi">Khoản chi</a></li>
                <li><a href="<?php echo $actual_link ?>/home/usdt/1">Tỷ giá USDT</a></li>
            </div>
            <li class="search-icon">
                <?php if (isset($_SESSION['name'])) { ?>
                    <label class="icon">
                        <span class="fa fa-user"></span>
                    </label>
                    <input type="text" value="<?php echo $_SESSION['name'] ?>" readonly>
                    <ul class="items-user">
                        <li><a href="<?php echo $actual_link ?>/home">Home</a></li>
                        <li><a href="#">Tài khoản</a></li>
                        <hr>
                        <li><a href="<?php echo $actual_link ?>/account/logout">Đăng xuất</a></li>
                    </ul>
                <?php } else { ?>
                    <a href="" class="btn-login">
                        Đăng kí tài khoản
                    </a>
                <?php } ?>
            </li>
        </ul>
    </header>

    <nav class="mobie-alert navigation navigation--inline">
        <ul>
            <li>
                <a id="overView" class="home-mobie-icon" href="<?php echo $actual_link ?>/home">
                    <!-- <span class="title-span-click">Tổng</span> -->
                    <i class="icon icon--2x fa-solid fa-chart-pie"></i>
                </a>
            </li>
            <li>
                <a id="revenue" class="home-mobie-icon" href="<?php echo $actual_link ?>/home/Thu">
                    <!-- <span class="title-span-click">Thu</span> -->
                    <i class="icon icon--2x fa-solid fa-hand-holding-dollar"></i>
                </a>
            </li>
            <li>
                <a id="expense" class="home-mobie-icon" href="<?php echo $actual_link ?>/home/Chi">
                    <!-- <span class="title-span-click">Chi</span> -->
                    <i class="icon icon--2x fa-solid fa-cart-plus"></i>
                </a>
            </li>
            <li>
                <a id="FinancialJar" class="home-mobie-icon" href="<?php echo $actual_link ?>/home/usdt/1">
                    <!-- <span class="title-span-click">Hũ</span> -->
                    <i class="icon icon--2x fa-solid fa-scale-balanced"></i>
                </a>
            </li>

        </ul>
    </nav>

    <div class="hidden"></div>

    <div class="container">
        <?php require_once "./src/views/content/" . $view . ".php" ?>
    </div>
    
    <div class="hidden-footer"></div>
    <div class="hidden-footer-menu"></div>

    <script>
        $('header ul li.btn span').click(function() {
            $('header ul div.items').toggleClass("show");
            $('header ul li.btn span').toggleClass("show");
        });
    </script>
</body>

</html>