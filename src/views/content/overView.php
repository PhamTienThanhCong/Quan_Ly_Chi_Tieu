<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var settings = {
            "url": "https://p2p.binance.com/bapi/c2c/v2/friendly/c2c/adv/search",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json"
                // "Cookie": "cid=5TeeBBuL"
            },
            "data": JSON.stringify({
                "page": 1,
                "rows": 10,
                "payTypes": [],
                "asset": "USDT",
                "tradeType": "BUY",
                "fiat": "VND",
                "publisherType": null
            }),
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
</script>