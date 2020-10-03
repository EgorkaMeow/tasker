<?php
    class Task {
        public static function countTasks()
        {
            $db = Db::getConnection();
            $sql = 'SELECT COUNT(*) as count FROM `tasks`';
            $result = $db->query($sql);
            $row = $result->fetch();

            return $row['count'];
        }

        public static function getTask($id)
        {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM `tasks` WHERE id=' . $id;
            $result = $db->query($sql);
            $row = $result->fetch();

            return $row;
        }

        public static function getTasks($offset, $sort)
        {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM `tasks` ORDER BY ' . $sort . ' LIMIT 3 OFFSET ' . $offset;
            $result = $db->query($sql);
            $data = [];
            while($row = $result->fetch()){
                $data[] = $row;
            }

            return $data;
        }

        public static function insertNewTask($username, $email, $text)
        {
            $db = Db::getConnection();
            $sql = "INSERT INTO `tasks`(`username`, `email`, `text`) VALUES (:username_bind, :email_bind, :text_bind)";
            $result = $db->prepare($sql);
            $result->bindParam(':username_bind',$username, PDO::PARAM_STR);
            $result->bindParam(':email_bind',$email, PDO::PARAM_STR);
            $result->bindParam(':text_bind',$text, PDO::PARAM_STR);
            return $result->execute();
        }

        public static function updateTask($id, $text, $status)
        {
            $db = Db::getConnection();
            $task_data = self::getTask($id);
            $sql = "";
            if($task_data['text'] == $text){
                $sql = "UPDATE `tasks` SET `text`=:text_bind, `status`=:status_bind WHERE id=:id_bind";
            }
            else {
                $sql = "UPDATE `tasks` SET `text`=:text_bind, `status`=:status_bind, `is_edit`='1' WHERE id=:id_bind";
            }
            $result = $db->prepare($sql);
            $result->bindParam(':text_bind', $text, PDO::PARAM_STR);
            $result->bindParam(':status_bind', $status, PDO::PARAM_STR);
            $result->bindParam(':id_bind', $id, PDO::PARAM_STR);
            return $result->execute();
        }
    }