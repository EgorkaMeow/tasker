<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/index/index.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Tasker</a>
        <div>
        <a class="btn btn-primary" href="../task/add" role="button">Добавить задачу</a>
        <?php if($is_login){ ?> 
            <a class="btn btn-danger" href="../logout" role="button">Выйти</a>
        <?php } else { ?>
            <a class="btn btn-success" href="../login" role="button">Авторизация</a>
        <?php } ?>
        </div>
        
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <table border="1">
                <thead>
                    <tr>
                        <th class="name_td">
                            <a href="../<?php echo $page; ?>/<?php if($sort == 'name_up') { echo 'name_down'; } else if($sort == 'name_down') { echo 'none'; } else { echo 'name_up'; } ?>">
                                <?php if($sort == 'name_up') { ?>
                                    <i class="fa fa-arrow-up"></i><?php } else if($sort == 'name_down') { ?> 
                                    <i class="fa fa-arrow-down"></i> <?php } ?> Имя пользователя
                            </a>
                        </th>
                        <th class="email_td">
                            <a href="../<?php echo $page; ?>/<?php if($sort == 'email_up') { echo 'email_down'; } else if($sort == 'email_down') { echo 'none'; } else { echo 'email_up'; } ?>">
                                <?php if($sort == 'email_up') { ?>
                                    <i class="fa fa-arrow-up"></i><?php } else if($sort == 'email_down') { ?> 
                                    <i class="fa fa-arrow-down"></i> <?php } ?> E-mail
                            </a>
                        </th>
                        <th class="task_td">
                            <a href="../<?php echo $page; ?>/<?php if($sort == 'task_up') { echo 'task_down'; } else if($sort == 'task_down') { echo 'none'; } else { echo 'task_up'; } ?>">
                                <?php if($sort == 'task_up') { ?>
                                    <i class="fa fa-arrow-up"></i><?php } else if($sort == 'task_down') { ?> 
                                    <i class="fa fa-arrow-down"></i> <?php } ?> Текст задачи
                            </a>
                        </th>
                        <th class="status_td">
                            <a href="../<?php echo $page; ?>/<?php if($sort == 'status_up') { echo 'status_down'; } else if($sort == 'status_down') { echo 'none'; } else { echo 'status_up'; } ?>">
                                <?php if($sort == 'status_up') { ?>
                                    <i class="fa fa-arrow-up"></i><?php } else if($sort == 'status_down') { ?> 
                                    <i class="fa fa-arrow-down"></i> <?php } ?> Статус
                            </a>
                        </th>
                        <?php if($is_login){ ?> 
                            <th></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($count_tasks == 0) { ?>
                        <tr>
                            <td class="not_tasks" colspan="<?php if($is_login) { echo 5; } else { echo 4; } ?>">
                                Нет задач
                            </td>
                        </tr>
                    <?php } else { 
                        foreach($data as $task){
                    ?>
                    <tr>
                        <td><?php echo $task['username']; ?></td>
                        <td><?php echo $task['email']; ?></td>
                        <td><?php echo htmlspecialchars($task['text']); ?></td>
                        <td><?php if($task['status'] == 1){ ?>Выполнено<?php } else { ?>Не выполнено<?php } if($task['is_edit'] == 1) { echo "<br><span class='is_edit'>Отредактировано администратором</span>"; } ?></td> 
                         <?php if($is_login){ ?>
                             <td><a href="../task/edit/<?php echo $task['id'] ?>"><i class="fa fa-edit"></i></a></td> 
                         <?php } ?>
                    </tr>
                    <?php 
                            }
                        }
                    ?>
            </table>
            <div class="pagination justify-content-center">
                <?php 
                    if($count_tasks > 3){
                        for($i = 1; $i <= ceil($count_tasks / 3); $i++ ){
                            if($i == $page){
                ?>
                    <span class="pag_item"><?php echo $i; ?></span>
                <?php
                            } else {
                ?>
                    <a class="pag_item" href="../<?php echo $i; ?>/<?php echo $sort ?>"><?php echo $i; ?></a>
                <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>