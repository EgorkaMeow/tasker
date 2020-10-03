<?php
    
    class TaskController {

        public static function getMainView($page, $sort)
        {   
            $is_login = isset($_SESSION['login']) ? true : false;
            $count_tasks = Task::countTasks();

            $data = [
                "none" => "id",
                "name_up" => "username",
                "name_down" => "username DESC",
                "email_up" => "email",
                "email_down" => "email DESC",
                "task_up" => "text",
                "task_down" => "text DESC",
                "status_up" => "status",
                "status_down" => "status DESC",
            ];
            if($count_tasks > 0) {
                $data = Task::getTasks(($page - 1) * 3, $data[$sort]);
            }

            include './views/index.php';
        } 

        public static function saveNewTask()
        {   
            $data = json_decode(file_get_contents('php://input'), true);

            try {
                Task::insertNewTask($data['username'], $data['email'], $data['task_text']);
            }
            catch (Exception $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Произошла ошибка, повторите попытку"
                ], true);
            }

            echo json_encode([
                "status" => "ok"
            ], true);
        } 

        public static function getAddTaskView()
        {   
            $is_login = isset($_SESSION['login']) ? true : false;

            include './views/add_task.php';
        } 


        public static function editTask()
        {   
            $is_login = isset($_SESSION['login']) ? true : false;

            if(!$is_login){
                echo json_encode([
                    "status" => "login_error",
                    "message" => "Сначала авторизуйтесь!"
                ], true);
                return;
            }

            $data = json_decode(file_get_contents('php://input'), true);
            
            try {
                Task::updateTask($data['id'], $data['task_text'], $data['status']);
            }
            catch (Exception $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Произошла ошибка, повторите попытку"
                ], true);
            }

            echo json_encode([
                "status" => "ok"
            ], true);
        }

        public static function getEditTaskView($task_id)
        {   
            $is_login = isset($_SESSION['login']) ? true : false;

            if($is_login){
                $data = Task::getTask($task_id);
                if(empty($data)){
                    header('Location: ../../');
                }
                else {
                    include './views/edit_task.php';
                }
            }
            else {
                header('Location: ../../');
            }
        }

    }