<?php
class data_possessing extends ConnectDB{
    function saveNewData($type,$id_user,$title,$price,$description,$created_at){
        $sql = "INSERT INTO `data_$type`(
                    `id_user`,
                    `title_$type`,
                    `price_$type`,
                    `description_$type`,
                    `created_at_$type`
                )
                VALUES(
                    '$id_user',
                    '$title',
                    '$price',
                    '$description',
                    '$created_at'
                )";
        mysqli_query($this->connection,$sql);
        mysqli_close($this->connection);
    }
    function view_data($type,$id){
        $sql = "SELECT * FROM `data_$type` WHERE `id_user` = '$id'";
        $data_result = mysqli_query($this->connection,$sql);
        // $data = mysqli_fetch_array($data);
        $data = [];

        foreach($data_result as $index=>$data_res){
            $data[] = [
                "id"=>$data_res["id_$type"],
                "title"=>$data_res["title_$type"],
                "price"=>$data_res["price_$type"],
                "description"=>$data_res["description_$type"],
                "created_at"=>$data_res["created_at_$type"]
            ];
            // echo json_encode($data);
        }

        mysqli_close($this->connection);
        return $data;
    }
    function data_update($type,$id_user,$id_expense,$title,$price,$description,$created_at){
        $sql = "UPDATE
                    `data_$type`
                SET
                    `title_$type` = '$title',
                    `price_$type` = '$price',
                    `description_$type` = '$description',
                    `created_at_$type` = '$created_at'
                WHERE
                    `id_$type` = '$id_expense' AND `id_user` = '$id_user'
                ";
        mysqli_query($this->connection,$sql);
        mysqli_close($this->connection);
    }
    function date_delete($type,$id_user,$id_expense){
        $sql = "DELETE FROM `data_$type` WHERE `id_$type` = '$id_expense' AND `id_user` = '$id_user'";
        mysqli_query($this->connection,$sql);
        mysqli_close($this->connection);
    }
}
?>