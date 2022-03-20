<?php
class JsonPosessing extends Controllers{
    public function binance_api($page){
        $page = $page[0];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://p2p.binance.com/bapi/c2c/v2/friendly/c2c/adv/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"page":'.$page.',"rows":10,"payTypes":[],"asset":"USDT","tradeType":"BUY","fiat":"VND","publisherType":null}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Cookie: cid=FBb5Btvt'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        echo $response;

    }
    
    public function save_data($type){
        if (isset($_SESSION['id']) == false){
            echo "0";
            exit();
        }
        $save = $this->model("data_possessing");
        $type = $type[0];
        $id_user = $_SESSION['id'];
        $title = $_POST['name-title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $created_at = $_POST['day'];
        echo $save->saveNewData($type,$id_user,$title,$price,$description,$created_at);
        
    }
    public function export_data($type){
        if (isset($_SESSION['id']) == false){
            echo "null";
            exit();
        }
        $type = $type[0];
        $date = "";
        if (isset($_POST['date'])){
            $date = $_POST['date'];
        }
        $data = $this->model("data_possessing");
        $id_user = $_SESSION['id'];
        $date_res = $data->view_data($type,$id_user,$date);
        // sleep(3);
        echo json_encode($date_res);
    }
    public function export_all_data(){
        if (isset($_SESSION['id']) == false){
            echo "null";
            exit();
        }
        $data = $this->model("data_possessing");
        $data_res = ["expense" => $data->view_all_data('expense',$_SESSION['id']), "revenue" => $data->view_all_data('revenue',$_SESSION['id'])];
        echo json_encode($data_res);
    }
    public function update_data($type){
        if (isset($_SESSION['id']) == false){
            echo "0";
            exit();
        }
        $edit = $this->model("data_possessing");
        $type = $type[0];
        $id_user = $_SESSION['id'];
        $id_expense = $_POST['id'];
        $title = $_POST['name-title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $created_at = $_POST['day'];
        $edit->data_update($type,$id_user,$id_expense,$title,$price,$description,$created_at);
        echo "1";
    }
    public function delete_data($type){
        if (isset($_SESSION['id']) == false){
            echo "0";
            exit();
        }
        $delete = $this->model("data_possessing");
        $type = $type[0];
        $id_user = $_SESSION['id'];
        $id_expense = $_POST['id'];
        $delete->date_delete($type,$id_user,$id_expense);
        echo "1";
    }
}
?>