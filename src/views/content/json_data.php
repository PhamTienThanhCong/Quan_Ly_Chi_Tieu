<link rel="stylesheet" href="<?php echo $actual_link ?>/public/css/binance_data.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<textarea id="data-respone" cols="30" rows="10">
    <?php echo $data[0] ?>
</textarea>
<br>
<a href="<?php echo $actual_link ?>/home/usdt/<?php echo $data[1] - 1 ?>">
    về trang trước
</a>
<br>
<a href="<?php echo $actual_link ?>/home/usdt/<?php echo $data[1] + 1 ?>">
    Sang trang sau
</a>


<div id="container-respond">

</div>

<div style="height: 60px"></div>
<script>
    var data_binance = []
    let data_result
    $(document).ready(function() {
        var data = document.getElementById('data-respone').value;
        const obj = JSON.parse(data);
        data_result = obj.data;
        for (var i = 0; i < data_result.length; i++) {
            // data người bán
            var one_data = {
                "id": data_result[i].advertiser.userNo,
                "name": data_result[i].advertiser.nickName,
                "order": data_result[i].advertiser.monthOrderCount,
                "success": parseFloat(data_result[i].advertiser.monthFinishRate).toFixed(2),
                "price": data_result[i].adv.price,
                "CanPrice": data_result[i].adv.tradableQuantity,
                "minPrice": parseInt(data_result[i].adv.minSingleTransAmount),
                "maxPrice": parseInt(data_result[i].adv.minSingleTransAmount),
            }
            data_binance.push(one_data);
        }
        for (var i = 0; i < data_binance.length; i++) {
            console.log(data_binance[i]['name'])
            update_one_data(data_binance[i]['id'], data_binance[i]['name'], data_binance[i]['order'], data_binance[i]['success'], data_binance[i]['price'], data_binance[i]['CanPrice'],
                data_binance[i]['minPrice'], data_binance[i]['maxPrice'])
        }


    });

    function update_one_data(id, name, order, success, price, CanPrice, minPrice, maxPrice) {
        document.getElementById('container-respond').innerHTML = document.getElementById('container-respond').innerHTML + `
            <hr>
            <div class="item-respond">
                <div class="infor">
                    <p class="name-info">
                        Tên: ` + name + `
                    </p>
                    <p>
                        Đã bán ` + order + ` | tỷ lệ ` + success + `%
                    </p>
                </div>
                <div class="infor">
                    <p style="margin-right: 5px">Giá: </p>
                    <p style="font-size: 25px">
                    ` + parseInt(price).toLocaleString('vi', {
                            style: 'currency',
                            currency: 'VND'
                        }) + `
                    </p><br>
                    <p>Hiện có: 
                    ` + CanPrice + ` USDT
                    </p><br>
                    <p>Giới hạn :` + minPrice.toLocaleString('vi', {style: 'currency', currency: 'VND'}) + ` - ` + maxPrice.toLocaleString('vi', {style: 'currency', currency: 'VND'}) + `</p><br>
                </div>
                <a href="https://p2p.binance.com/en/advertiserDetail?advertiserNo=` + id + `">
                    <button>Mua ngay</button>
                </a>
            </div>
            <hr>
        `
    }
</script>