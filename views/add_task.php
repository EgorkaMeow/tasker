<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="../">Tasker</a>
        <div>
        <div>
        <?php if($is_login){ ?> 
            <a class="btn btn-danger" href="../logout" role="button">Выйти</a>
        <?php } else { ?>
            <a class="btn btn-success" href="../login" role="button">Авторизация</a>
        <?php } ?>
        </div>
        
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <form>
                <div class="form-group">
                    <label for="username">Имя пользователя:</label>
                    <input type="text" class="form-control" id="username" placeholder="Имя пользователя">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="task_text">Текст задачи:</label>
                    <textarea class="form-control" id="task_text" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" id="save">Coхранить</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../public/add_task/add_task.js"></script></body></body>
</html>