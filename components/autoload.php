<?php
    spl_autoload_register(function ($class_name) {
        $folders = array(
            'controllers',
            'models',
            'views',
            'components'
        );

        foreach($folders as $folder){
            $fn = $folder . '/' . $class_name . '.php';
            
            if(file_exists($fn)){
                include $fn;
            }
        }
    });