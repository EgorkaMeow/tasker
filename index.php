<?php
    session_start();

    require_once('./components/autoload.php');

    Router::route('GET', '/', function(){
        header('Location: ./1/none');
    });

    Router::route('GET', '/(\d+)/(\w+)', function($page, $sort){
        TaskController::getMainView($page, $sort);
    });

    Router::route('GET', '/task/add', function(){
        TaskController::getAddTaskView();
    });

    Router::route('POST', '/task/add', function(){
        TaskController::saveNewTask();
    });

    Router::route('GET', '/task/edit/(\d+)', function($task_id){
        TaskController::getEditTaskView($task_id);
    });

    Router::route('POST', '/task/edit', function(){
        TaskController::editTask();
    });

    Router::route('GET', '/login', function(){
        if(AuthController::isLogin()){
            header('Location: ./');
        }
        AuthController::getView();
    });

    Router::route('GET', '/logout', function(){
        if(AuthController::isLogin()){
            AuthController::logout();
        }
        else {
            header('Location: ./');
        }
    });

    Router::route('POST', '/login', function(){
        AuthController::login();
    });
      
    Router::execute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);