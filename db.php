<?php 
require "libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=registr',
        'root', 'root' );
session_start();


// Для того чтобы пользователя запомнить, то есть залогинить, исп. сешн старт (как 2ой вариант можно использовать куки)


?>