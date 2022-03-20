<style>
    #myChart {
        margin: auto;
    }
</style>
<h3 style="text-align: center">Tổng quan</h3>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<div id="alert-total">

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var hostName = window.location;
    var data_res;
    hostName = hostName.protocol + "//" + hostName.host + "/jsonPosessing/export_all_data";
    $(document).ready(function() {
        $.ajax({
            url: hostName,
            dataType: "json",
            success: function(response) {
                data_res = response;
                draw(data_res);
            }
        });
    });

    function draw(data_res) {
        var xValues = ["Thu", "Chi"];
        var yValues = [data_res["revenue"], data_res["expense"]];
        document.getElementById("alert-total").innerHTML = `
        <p>
            Khoản chi được tính: ` + parseInt(data_res["expense"]).toLocaleString('vi', {style : 'currency', currency : 'VND'}) + `
        </p>
        <p>
            Khoản thu được tính: ` + parseInt(data_res["revenue"]).toLocaleString('vi', {style : 'currency', currency : 'VND'}) + `
        </p>
        `
        var barColors = [
            "#00aba9",
            "#b91d47",
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Tỷ lệ thu chi"
                }
            }
        });
    }
</script>