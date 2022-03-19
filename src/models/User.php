<?php
    class User extends ConnectDB{
        function CreateUser($name,$email,$password){
            $sql = "SELECT COUNT(*) AS SL FROM `user` WHERE `email` = '$email'";
            $check = mysqli_query($this->connection,$sql);
            $check = mysqli_fetch_array($check);

            if($check['SL']>0){
                return false;
            }else{
                $token = bin2hex(random_bytes(26));
                $sql = "INSERT INTO `user`(
                            `name`,
                            `email`,
                            `password`,
                            `token`
                        )
                        VALUES(
                            '$name',
                            '$email',
                            '$password',
                            '$token'
                        )";
                mysqli_query($this->connection,$sql);
                return true;
            }

        }

        function loginUser($email,$password,$remember){
            $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
            $user = mysqli_query($this->connection,$sql);
            $user = mysqli_fetch_array($user);

            if (isset($user['password'])){
                $verify = password_verify($password, $user['password']);
                if ($verify){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    if ($remember == 1){
                        setcookie("token", $user['token'], time() + (86400 * 30), "/");
                    }
                    return true;
                }  
            }else{
                return false;
            }
        }

        function getInfoUser(){
            if(isset($_COOKIE['token'])){
                $token = $_COOKIE['token'];

                $sql = "SELECT * FROM `user` WHERE `token` = '$token'";

                $user = mysqli_query($this->connection,$sql);
                $user = mysqli_fetch_array($user);
                
                if (isset($user['email'])){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                }
            }
        }
    }
?>