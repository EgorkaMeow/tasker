<?php

    class AuthController {

        public static function isLogin() 
        {
            if(isset($_SESSION['login'])){
                return true;
            }

            return false;
        }

        public static function login()
        {
            $data = json_decode(file_get_contents('php://input'), true);
            if($data['username'] == 'admin' && $data['password'] == '123'){
                $_SESSION['login'] = true;
                
                echo json_encode([
                    'status' => 'ok'
                ]);

                return;
            }

            echo json_encode([
                'status' => 'error',
                'message' => 'Неверный логин или пароль'
            ]);
        }

        public static function logout()
        {
            unset($_SESSION['login']);
            header('Location: ./');
        }

        public static function getView()
        {
            include './views/login.php';
        } 
    }