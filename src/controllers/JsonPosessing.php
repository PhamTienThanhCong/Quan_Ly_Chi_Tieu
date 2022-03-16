<?php
class JsonPosessing extends Controllers{
    public function default(){
        echo "test";
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